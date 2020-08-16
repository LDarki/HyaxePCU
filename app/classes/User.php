<?php 
require("./app/core/db.php");
class User {
    public $name;
    public $mail;
    public $data = array();
    protected $db;

    public function __construct() 
    {
        $this->db = DB::instance();
        $this->name = "Desconocido";
    }

    public function isLogged() : bool
    {
        if($_SESSION["Logged"] == 1 && !is_null($this->name)) return 1;
        return 0;
    }

    public function login($nameD, $passD)
    {
        $name = $this->Xss->escape($nameD);
        $pass = $this->Xss->escape($passD);
        $query = $this->db->run("SELECT password FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pass, $query["password"]))
        {
            $userdata = $this->db->run("SELECT id, email FROM users WHERE name = ?", [$name])->fetch(PDO::FETCH_ASSOC);
            $char = $this->db->run("SELECT * FROM characters WHERE user_id=?", [$userdata["id"]])->fetch(PDO::FETCH_ASSOC);
            $this->name = $name;
            $this->mail = $userdata["email"];
            $_SESSION["Logged"] = 1;
            $this->data = array(
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

    public function destroy()
    {
        unset($this->name);
        unset($this->mail);
        unset($this->data);
        unset($this->db);
        $_SESSION["Logged"] = 0;
        return 1;
    }
}
?>