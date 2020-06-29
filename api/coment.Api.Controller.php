<?php

require_once 'models/comentarios.model.php';
require_once 'api/api.View.php';

class ComentApiController{
    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ComentModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    public function getcoments(){
        $coments = $this->model->getAll();
        $this->view->response($coments,200);

    }

    public function getcomentone($params = []){
      $idcomentprod = $params[':ID'];
      
        $comentprod = $this->model->getcomentprod($idcomentprod);
        if ($comentprod)
            $this->view->response($comentprod, 200);
        else
            $this->view->response("no existe comentarios para el producto con id {$idcomentprod}", 404);
    }

    public function delonecoment($params = []){
        $idcoment = $params[':ID'];
        $coment = $this->model->getone($idcoment); // HACER

        // verifico que exista
        if (empty($coment)) {
            $this->view->response("no existe el comentario con id {$idcoment}", 404);
            die();
        }

        // si existe la elimina
        $this->model->delcoment($idcoment); // HACER delcoment
        $this->view->response("La tarea con id {$idcoment} se eliminó correctamente", 200);
    }
    public function getdata(){
        return json_decode($this->data);
        }

    public function addcoments(){
        // devuelve el JSOn enviado por POST
        $body = $this->getdata();

        // inserta el comentario
        $detalle = $body->detalle;
        $puntaje = $body->puntaje;
        $id_prod = $body->id_producto_fk;

        $idcoment = $this->model->addcoment($detalle,$puntaje,$id_prod);

        if(empty($idcoment)){
            $this->view->response("La tarea no fue creada", 500);
            die;
        }
        $this->view->response("La tarea fue agregada correctamente con el id {$idcoment}", 200);
    }

  /*  public function getprod($params = []){
        $tareas = $this->model->getAll();
        $this->view->response($tareas,200);

    }

    public function getoneprod($params = []){
        $idTarea = $params[':ID'];

        $tarea = $this->model->getone($idTarea);
        if ($tarea)
            $this->view->response($tarea, 200);
        else
            $this->view->response("no existe tarea con id {$idTarea}", 404);
    }
    
    public function deloneprod($params = []) {
        $idTarea = $params[':ID'];
        $tarea = $this->model->getone($idTarea);
        
        // verifico que exista
        if (empty($tarea)) {
            $this->view->response("no existe tarea con id {$idTarea}", 404);
            die();
        }

        // si existe la elimina
        $this->model->borrarProducto($idTarea);
        $this->view->response("La tarea con id {$idTarea} se eliminó correctamente", 200);
    }*/



    

}