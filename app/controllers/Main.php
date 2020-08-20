<?php

defined('_ADF') or exit('Restricted Access');

class Main extends Controller {
    public function index() {
        $notices = Announcements::getLastest();
        if(User::isLogged()) return $this -> view('index', array('name' => $_SESSION["username"], 'notice' => $notices, 'userData' => $_SESSION["data"]["character"], 'notification' => NULL, 'notificationType' => 'info'));
        else return header("Location: ./login");
    }
}
?>