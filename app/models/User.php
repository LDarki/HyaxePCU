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
        $ip = "";

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

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
            self::destroy();
            return false;
        }
        else
        {
            $_SESSION['lastaccess'] = time();
        }
        return true;
    }

    public static function login($nameD, $passD)
    {
        $db = DB::instance();
        $name = Xss::escape($nameD);
        $pass = Xss::escape($passD);
        $query = $db->run("SELECT password FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);

        if(password_verify($pass, $query["password"]))
        {
            $userdata = $db->run("SELECT id, email FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);
            $char = $db->run("SELECT * FROM characters WHERE user_id=?", [$userdata["id"]])->fetch(PDO::FETCH_ASSOC);

            $_SESSION["username"] = Xss::escape($name);
            $_SESSION["mail"] = Xss::escape($userdata["email"]);
            $_SESSION["logged"] = 1;

            $ip = "";

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $_SESSION["ip"] = $ip;
            $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['lastaccess'] = time();

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
                        'faction' => $char["faction"],
                        'dni' => $char["dni"],
                        'age' => $char["age"]
                    )
            );
            return 1;
        }
        return 0;
    }

    public static function destroy()
    {
        unset($data);
        session_unset();
        session_destroy();
        return 1;
    }
}
?>