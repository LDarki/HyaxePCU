<?php

defined('_ADF') or exit('Restricted Access');

class Login extends Controller {
    public function index() {
        if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["username"]) && !empty($_POST["username"])) // si insertó la contraseña y el nombre
        {
            $uname = $this->xss->getPostValue("username");
            $pass = $this->xss->getPostValue("password");
            if(!NoCSRF::check('csrf_token', $_POST, true, 60*10)) return header("Location: ./login");
            $user = User::login($uname, $pass);
            if($user == 0) // si no pudo logear
            {
                header("Location: ./login");
            }
            else // si pudo logear
            {
                header("Location: ./");
            }
        }
        else
        {
            return $this -> view('login', array('csrfToken' => NoCSRF::generate('csrf_token'), 'name' => "Desconocido", 'notification' => "Estás por ingresar al Panel de Control de Usuario.", 'notificationType' => "info"));
        }
    }
}
?>