<?php
require_once 'views/auth.view.php';
require_once 'models/auth.model.php';
require_once 'views/product.view.php';
require_once 'views/error.view.php';



class AuthController
{

    private $view;
    private $model;
    private $errorview;

    public function __construct()
    {
        $this->view = new AuthView();
        $this->model = new AuthModel();
        $this->errorview = new ErrorView();
    }

    public function ShowLogin()
    {

        $this->view->showFormUser();
    }

    public function verifyUser()
    {

        $usuario = $_POST['nombre_usuario'];
        $pass = $_POST['contrasenia'];

        //busco el usuario

        $verificado = $this->model->VerUserRegistrado($usuario);

        if (!empty($verificado) && password_verify($pass, $verificado->contrasenia)) {

            // abro session y guardo al usuario logueado
            session_start();
            $_SESSION['IS_LOGGED'] = true;
            $_SESSION['ID_USER'] = $verificado->id_usuario;
            $_SESSION['USERNAME'] = $verificado->nombre_usuario;
            $_SESSION['TIPO'] = $verificado->tipo;

            header("Location: " . BASE_URL . "listar");
        } else {
            $this->view->showFormUser("Datos inválidos ");
        }
    }

    public function endSesion()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "inicio");
    }


    public function ShowFormRegistro()
    {

        $this->view->showFormRegistroUser();
    }

    public function RegistrarUsuario()
    {


        $tipo = "registrado";
        $usuario = $_POST['nombre_usuario'];
        $mail = $_POST['mail'];
        $pass = $_POST['contrasenia'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        if (empty($_POST['nombre_usuario']) || empty($_POST['mail']) || empty($_POST['contrasenia'])) {
            $msg = "Campos incompletos, intente nuevamente";
            $this->errorview->showError($msg);
            die;
        }


        //busco si el usuario ya existe

        $verificado = $this->model->VerUserRegistrado($usuario);

        if (!($verificado)) {
            $this->model->InsertarUsuario($usuario, $mail, $hash, $tipo);
            $this->verifyUser();
        } else {
            $msg = "Usuario repetido";
            $this->errorview->showError($msg);
        }
    }

    public function showUsers()
    {
        $usuarios = $this->model->getUsers();
        $this->view->viewUsers($usuarios);
    }

    public function deleteUser($user)
    {
    
    $usuario=$this->model->getUser($user);
    
    if($user!=$_SESSION ["ID_USER"] && ($usuario->tipo!="admin")){
        $this->model->delUser($user);
        $this->showUsers();
    }else{
        $msg = "No puedes eliminar un Usuario Administrador o eliminarte";
        $this->errorview->showError($msg);die;
    }
       
    }

    public function editUser($id)
    {
        $usuario = $this->model->getUser($id);        //devuelve los datos del usuario para modificar los cambios
        $this->view->showFormEditUser($usuario);
    }

    public function editarUser()
    {
        $idUser = $_POST['iduser'];
        $tipo = $_POST['tipo'];
        $usuario=$this->model->getUser($idUser);
        //var_dump($usuario);die;
        if($usuario->tipo=="admin"&& $idUser!=$_SESSION ["ID_USER"]){
            $msg = "No puedes editar un Usuario Administrador ";
            $this->errorview->showError($msg);die;
        }
        if($idUser!=$_SESSION ["ID_USER"]){
            $this->model->modifyUser($tipo, $idUser);
            $this->showUsers();
        }else{
            $this->model->modifyUser($tipo, $idUser);
            $this->endSesion();
        }
        
    }
    public function restablecer()
    {
        $this->view->showformreestablecer();
    }

    public function reenviocontra()
    {
        $mail = $_POST['mail'];

        $existe = $this->model->buscarUsuario($mail);
        if (!$existe) {
            $msg = "NO existe ese mail registrado";
            $this->errorview->showError($msg);
        } else {
            echo "el usuario esta registrado...";
            //var_dump($existe);die;
        }
    }
}
