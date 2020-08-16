<?php
require_once './app/classes/User.php';
require_once './app/classes/Xss.php';

class Controller {

    protected $user;
    protected $xss;

    public function __construct() {
        $this->user = new User();
        $this->xss = new Xss();
    }

    public function model($model) {
        require_once './app/models/' . $model . '.php';
        return new $model();
    }
    
    public function view($view, $data = array() ) {
        require_once './views/' . $view . '.php';
    }

    public function Xss()
    {
        return $this->xss;
    }

    public function getCurrentUser()
    {
        return $this->user;
    }

    public function destroyCurrentUser()
    {
        $this->user->destroy();
        return 1;
    }
}
?>