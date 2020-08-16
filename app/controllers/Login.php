<?php
class Login extends Controller {
    public function index() {
        if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["username"]) && !empty($_POST["username"])) // si insertó la contraseña y el nombre
        {
            $uname = $this->Xss()->getPostValue("username");
            $pass = $this->Xss()->getPostValue("password");
            $user = $this->getCurrentUser()->login($uname, $pass);
            if($user == 0) // si no pudo logear
            {
                header("Location: ./login");
            }
            else // si pudo logear
            {
                $user = $this->getCurrentUser();
                header("Location: ./");
            }
        }
        else 
        {
            return $this -> view('login', array('name' => "Desconocido", 'notification' => "Estás por ingresar al Panel de Control de Usuario."));
        }
    }
}
?>