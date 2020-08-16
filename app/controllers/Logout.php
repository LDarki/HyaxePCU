<?php
class Logout extends Controller {
    public function index() {
        if($this->getCurrentUser()->isLogged()) // si ya tiene una sesión iniciada
        {
            $this->getCurrentUser()->destroy();
            header("Location: ./login");
            return $this -> view('login', array('name' => "Desconocido", 'notification' => "Acabas de cerrar tu sesión."));
        }
        else 
        {
            header("Location: ./login");
            return $this -> view('login', array('name' => "Desconocido", 'notification' => "Estás por ingresar al Panel de Control de Usuario."));
        }
    }
}
?>