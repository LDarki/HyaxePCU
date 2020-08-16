<?php
class Main extends Controller {
    public function index() {
        $this -> view('index', array('name' => "Desconocido"));
    }
}
?>