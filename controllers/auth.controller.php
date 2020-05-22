<?php
require_once 'views/auth.view.php';
require_once 'models/auth.model.php';


class AuthController{
    
    private $view;
    private $model;

    public function __construct() {
        $this->view = new AuthView();
        $this->model=new AuthModel();
    }

    public function ShowLogin(){
                
        $this->view->showFormUser();
    }

    public function verifyUser(){

        $usuario = $_POST['nombre_usuario'];
        $pass = $_POST['contrasenia'];

                   
        $verificado=$this->model->VerUserRegistrado($usuario,$pass);
        if (!empty($verificado)){
            echo 'se da acceso al administrador';
            
        }else{
            echo 'Usuario y/o contraseña no registrada';
            echo 'Se da acceso público';
        }
            


    }
}