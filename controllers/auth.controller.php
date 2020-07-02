<?php
require_once 'views/auth.view.php';
require_once 'models/auth.model.php';
require_once 'views/product.view.php';
require_once 'views/error.view.php';



class AuthController{
    
    private $view;
    private $model;
    private $errorview;
   
    public function __construct() {
        $this->view = new AuthView();
        $this->model=new AuthModel();
        $this->errorview = new ErrorView();
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
             $_SESSION['TIPO'] =$verificado->tipo;
            // var_dump($_SESSION);die;
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
        $tipo ="registrado";
        $usuario = $_POST['nombreusuario'];
        $pass = $_POST['contraseniaUser'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);     
    
        //busco si el usuario ya existe
                           
       $verificado=$this->model->VerUserRegistrado($usuario);
       
       if (!($verificado)){
            $this->model->InsertarUsuario($usuario,$hash,$tipo);
            header("Location: " . BASE_URL . "listar");
        
        }else{
            $msg="Usuario repetido";
            $this->errorview-> showError($msg);
        }      
    }

    public function showUsers(){
        $usuarios=$this->model->getUsers();
        $this->view->viewUsers($usuarios);
    }

    public function deleteUser($user){
        $this->model->delUser($user);
        $usuarios=$this->model->getUsers();
        $this->view->viewUsers($usuarios);
    }

    public function editUser($id){
        $usuario=$this->model->getUser($id);        //devuelve los datos del usuario para modificar los cambios
        //var_dump($usuario);die;       
        $this->view->showFormEditUser($usuario);      
    } 
    
    public function editarUser(){
<<<<<<< HEAD
      $idUser=$_POST['iduser'];
       // $nameUser=$_POST['nombreUsuario'];
        $tipo = $_POST['tipo'];
       var_dump($idUser);
        //var_dump($nameUser);
        var_dump($tipo);die;
=======
        $idUser=$_POST['iduser'];
        $nameUser=$_POST['nombreUsuario'];
        $tipo = $_POST['tipo'];        
>>>>>>> e8da33799c92157a4c69fe6fb378fe4673d1c492
        $this->model->modifyUser($nameUser,$tipo,$idUser);
        $usuarios=$this->model->getUsers();
        $this->view->viewUsers($usuarios);
       
    }
}