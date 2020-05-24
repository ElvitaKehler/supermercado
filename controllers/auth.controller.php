<?php
require_once 'views/auth.view.php';
require_once 'models/auth.model.php';
require_once 'views/product.view.php';



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
     
        //busco el usuario
                           
        $verificado=$this->model->VerUserRegistrado($usuario);
      
        if (!empty($verificado) && password_verify($pass, $verificado->contrasenia)) {
           
             // abro session y guardo al usuario logueado
             session_start();
             $_SESSION['IS_LOGGED'] = true;
             $_SESSION['ID_USER'] = $verificado->id_usuario;
             $_SESSION['USERNAME'] = $verificado->nombre_usuario;
             
             header("Location: " . BASE_URL . "listar");

            }  else {
            $this->view->showFormUser("Datos inválidos ");
            }
           
         }
            


    
}