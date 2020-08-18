<?php

defined('_ADF') or exit('Restricted Access');

require_once './app/classes/Xss.php';
require_once './app/classes/Csrf.php';
require_once './app/models/User.php';

class Controller {
    public $xss;

    public function __construct() {
        $this->xss = new Xss();
    }

    public function view($view, $data = array() ) {
        require_once './views/' . $view . '.php';
    }
}
?>