<?php

defined('_ADF') or exit('Restricted Access');

class Logout extends Controller {
    public function index() {
        if(User::isLogged()) // si ya tiene una sesión iniciada
        {
            User::destroy();
            header("Location: ./login");
        }
        else 
        {
            header("Location: ./login");
        }
    }
}
?>