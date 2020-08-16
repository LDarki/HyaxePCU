<?php
class Main extends Controller {
    public function index() {
        if($this->getCurrentUser()->isLogged()) $this -> view('index', array('name' => "Desconocido"));
        else return $this -> view('login', array('name' => "Desconocido", 'notification' => "Estás por ingresar al Panel de Control de Usuario."));
    }
}
?>