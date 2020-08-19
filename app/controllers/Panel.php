<?php

defined('_ADF') or exit('Restricted Access');

class Panel extends Controller {
    public function index() {
        User::updateData();
        if(User::isLogged()) return $this -> view('panel', array('name' => $_SESSION["username"], 'userData' => $_SESSION["data"]["character"], 'notification' => NULL, 'notificationType' => 'info'));
        else return header("Location: ./login");
    }
}
?>