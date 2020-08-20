<?php

defined('_ADF') or exit('Restricted Access');

class AccessToken extends Controller {
    public function index() {
        if(isset($_POST["username"]) && !empty($_POST["username"]) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(!NoCSRF::check('csrf_token', $_POST, 60*10)) return header("Location: ./accessToken");
            $uname = $this->xss->getPostValue("username");
            if(User::genToken($uname) == 0) header("Location: ./accessToken");
        }
        else
        {
            return $this -> view('accessToken', array('csrfToken' => NoCSRF::generate('csrf_token'), 'name' => "Desconocido", 'notification' => "Estás por ingresar al Panel de Control de Usuario.", 'notificationType' => "info"));
        }
    }
}
?>