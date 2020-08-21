<?php 

defined('_ADF') or exit('Restricted Access');

require_once("./app/core/db.php");
require_once("./app/classes/Xss.php");

class User {
    public static function isLogged() : bool
    {
        if(self::checkForSession() && isset($_SESSION["logged"]) && $_SESSION["logged"] == 1 && !is_null($_SESSION["username"])) return true;

        return false;
    }

    public static function checkForSession() : bool
    {
        $ip = self::getIp();

        if ($ip != $_SESSION['ip'])
        {
            self::destroy();
            return false;
        }

        if ($_SERVER['HTTP_USER_AGENT'] != $_SESSION['useragent'])
        {
            self::destroy();
            return false;
        }

        if (time() > ($_SESSION['lastaccess'] + 7200))
        {
            if($_SESSION['usesToken'] == 0) self::updateData();
            else // Si usa token borramos la sesión
            {
                self::destroy();
                return false;
            }
        }
        return true;
    }

    public static function genToken($nameD)
    {
        $db = DB::instance();
        $name = Xss::escape($nameD);

        $query = $db->run("SELECT * FROM pcu_tokens WHERE nombre = ?", [$name])->fetch(PDO::FETCH_ASSOC);
        if(!empty($query)) return 0;

        $ip = self::getIp();

        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]."/".$date["hours"]."/".$date["minutes"];

        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $ubicacion = "Pais:".$details->country."-"."Ciudad:".$details->city;

        $token = HashingStr::eobf($name.$ip.$fecha);

        $usernameF = $db->run("SELECT email FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);

        $browser = $_SERVER['HTTP_USER_AGENT'];

        $userfixdata = array(
            "mail" => $usernameF["email"],
            "accessToken" => $token,
            "userBrowser" => $browser,
            "name" => $name,
            "ip" => $ip
        );

        $db->run("INSERT INTO pcu_tokens (token, nombre, fecha, ip, ubicacion) VALUES (?,?,?,?,?)", [$token, $name, $fecha, $ip, $ubicacion])->fetch(PDO::FETCH_ASSOC);
        $db->run("INSERT INTO pcu_tokenslog (nombre, fecha, ip, ubicacion) VALUES (?,?,?,?)", [$name, $fecha, $ip, $ubicacion])->fetch(PDO::FETCH_ASSOC);

        return $userfixdata;
    }

    public static function checkTokenTime()
    {
        $db = DB::instance();
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]."/".strval($date["hours"]-1)."/".$date["minutes"];
        $db->run("DELETE FROM pcu_tokens WHERE fecha < ?", [$fecha])->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function login($nameD, $passD)
    {
        $db = DB::instance();
        $name = Xss::escape($nameD);
        $pass = Xss::escape($passD);

        $ip = self::getIp();

        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]."-".$date["hours"].":".$date["minutes"];

        $token = HashingStr::eobf($name.$ip.$fecha);

        $queryT = $db->run("SELECT token FROM pcu_tokens WHERE nombre = ?", [$name])->fetch(PDO::FETCH_ASSOC);

        if(!empty($queryT))
        {
            if($queryT["token"] == $token && $pass === $token)
            {
                $userdata = $db->run("SELECT id, email, admin FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);

                $_SESSION["username"] = Xss::escape($name);
                $_SESSION["mail"] = Xss::escape($userdata["email"]);
                $_SESSION["logged"] = 1;
    
                $ip = self::getIp();
    
                $_SESSION["ip"] = $ip;
                $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    
                $_SESSION['accessToken'] = $token;
                $_SESSION['usesToken'] = 1;
    
                $_SESSION['lastaccess'] = time();
    
                self::updateData();
                return 1;
            }  
        }          

        $query = $db->run("SELECT password FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);

        if(password_verify($pass, $query["password"]))
        {
            $userdata = $db->run("SELECT id, email, admin FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);

            $_SESSION["username"] = Xss::escape($name);
            $_SESSION["mail"] = Xss::escape($userdata["email"]);
            $_SESSION["logged"] = 1;

            $ip = self::getIp();

            $_SESSION["ip"] = $ip;
            $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['lastaccess'] = time();

            $_SESSION['usesToken'] = 0;

            self::updateData();
            return 1;
        }
        return 0;
    }

    public static function getRank()
    {
        switch($_SESSION["data"]["character"]["admin"])
        {
            case 7: return "Administrador";
            case 6: return "Manager";
            case 5: return "Programador";
            case 4: return "Moderador Global";
            case 3: return "Moderador";
            case 2: return "Soporte";
            case 1: return "Ayudante";
            case 0: return "Usuario";
            default: return "Usuario";
        }
    }

    public static function isAdmin() : bool
    {
        if($_SESSION["data"]["character"]["admin"] > 0) return true;
        return false;
    }

    public static function updateData()
    {
        if(!self::isLogged()) return 0;

        /* Regenerar id de la sesión (esto es necesario para garantizar segurodad) */
 
        // Guardamos la sesión
        $sess = array();
        foreach ($_SESSION as $k => $v) {
            $sess[$k] = $v;
        }

        // Generamos un nuevo id y le asignamos los datos anteriores
        session_regenerate_id();
        foreach ($sess as $k => $v) {
            $_SESSION[$k] = $v;
        }

        unset($sess);

        $db = DB::instance();

        $name = Xss::escape($_SESSION["username"]);

        $userdata = $db->run("SELECT id, email, admin FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);
        $char = $db->run("SELECT * FROM characters WHERE user_id=?", [$userdata["id"]])->fetch(PDO::FETCH_ASSOC);
        $fac = $db->run("SELECT * FROM factions WHERE id=?", [$char["faction"]])->fetch(PDO::FETCH_ASSOC);

        if(!isset($fac["name"]) || is_null($fac["name"])) $fac["name"] = "Ninguna";

        $facRank = $fac["rank".$char["rank"]];

        if($char["rank"] == 0) $facRank = "Ninguno";

        $admin = $userdata["admin"];

        if(isset($_SESSION['usesToken']) && $_SESSION['usesToken'] == 1) $admin = 0;

        $_SESSION["data"] = array(
            'character' => 
                array(
                    'name' => $char["name"],
                    'exp' => $char["exp"],
                    'level' => $char["level"],
                    'lastLogin' => $char["last_login_date"],
                    'money' => $char["money"],
                    'bank' => $char["bank"],
                    'hycoins' => $char["hycoin"],
                    'faction' => array(
                        'name' => $fac["name"],
                        'rank' => $facRank
                    ),
                    'health' => $char["health"],
                    'armour' => $char["armour"],
                    'dni' => $char["dni"],
                    'age' => $char["age"],
                    'admin' => $admin
                )
        );
        return 1;
    }

    public static function getIp()
    {
        $ip = "";

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public static function destroy()
    {
        if($_SESSION['usesToken'] == 1)
        {
            $db = DB::instance();
    
            $userdata = $db->run("DELETE FROM pcu_tokens WHERE token=?", [$_SESSION['accessToken']]);
        }
        session_unset();
        session_destroy();
        return 1;
    }
}
?>