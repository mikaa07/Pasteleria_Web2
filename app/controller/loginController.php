<?php
require_once './app/view/loginView.php';
require_once './app/model/usuarioModel.php';
require_once './helper/loginHelper.php';

class loginController {
    private $view;
    private $model;
    private $helper;
    
    public function __construct() {
        $this->model = new usuarioModel();
        $this->view = new loginView();
        $this->helper = new loginHelper();
    }

    public function showLogin(){
        $this->view->renderLogin();
    }

    public function showPanel(){
        $isAdmin = $this->helper->checkLoggedIn();
        $users = $this->model->getUsers();
        $this->view->renderPanel($isAdmin, "", $users);
    }
    

    
    public function logout() {
        session_start();
        session_destroy();
        $this->view->showHome();
    }

    public function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['id_usuario'] = $user->id_usuario;
                $_SESSION["email"] = $_POST['email'];
                $_SESSION['nombre'] = $user->nombre;
                $_SESSION['rol'] = $user->rol;
                $this->view->showHome();
            } else {
                $this->view->renderLogin("contraseña incorrecta");
            }
        } else {
            $this->view->renderLogin("faltan completar campos");
        }
    }


}
