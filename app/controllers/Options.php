<?php

defined('_ADF') or exit('Restricted Access');

class Options extends Controller {
    public function index() {
        User::updateData();
        if(User::isLogged()) return $this -> view('options', array('name' => $_SESSION["username"], 'userData' => $_SESSION["data"]["character"], 'notification' => NULL, 'notificationType' => 'info'));
        else return header("Location: ./login");
    }
}
?>