<?php

defined('_ADF') or exit('Restricted Access');

class Admin extends Controller {
    public function index() {
        User::updateData();
        if(User::isLogged() && User::isAdmin()) return $this -> view('admin', array('name' => $_SESSION["username"], 'userData' => $_SESSION["data"]["character"], 'notification' => NULL, 'notificationType' => 'info'));
        else return header("Location: ./");
    }
}
?>