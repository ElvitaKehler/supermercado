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

    public function endSesion(){
        session_start();
        session_destroy();        
        header("Location: " . BASE_URL . "inicio");
    }
     
    
    public function ShowFormRegistro(){
       

         $this->view->showFormRegistroUser();
    }

    public function RegistrarUsuario(){
       
        
        $usuario = $_POST['nombreusuario'];
        $pass = $_POST['contraseniaUser'];
    
        //busco si el usuario ya existe
                           
       $verificado=$this->model->VerUserRegistrado($usuario);
       
       if (!($verificado)){
            $this->model->InsertarUsuario($usuario,$pass);
            header("Location: " . BASE_URL . "listar");
        
        }

       
        
    }


    
}