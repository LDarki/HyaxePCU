<?php

defined('_ADF') or exit('Restricted Access');

class Main extends Controller {
    public function index() {
        if(User::isLogged()) return $this -> view('index', array('name' => $_SESSION["username"], 'userData' => $_SESSION["data"]["character"], 'notification' => NULL, 'notificationType' => 'info'));
        else return header("Location: ./login");
    }
}
?>