<?php

require_once 'models/comentarios.model.php';
require_once 'api/api.View.php';

class ComentApiController
{
    private $model;
    private $view;
    private $data;

    function __construct()
    {
        $this->model = new ComentModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input"); //trae el cuerpo(body en postman) para agregar el comentario
    }

    public function getcoments($params = [])
    {
        $orden = [];

        if (isset($_GET['sort'])) {           ///api/comentarios?sort=id_producto_fk&order=asc
            $orden['sort'] = $_GET['sort'];
            if (isset($_GET['order'])) {
                $orden['order'] = $_GET['order'];
            }
        }
        $coments = $this->model->getAll($orden);  //traigo todas las tareas
        $this->view->response($coments, 200);
    }

    public function getcomentone($params = [])
    {         //trae todos los comentarios de un producto en part.
        $idcomentprod = $params[':ID'];
        $orden = [];

        if (isset($_GET['sort'])) {           ///api/comentarios?sort=id_producto_fk&order=asc
            $orden['sort'] = $_GET['sort'];
            if (isset($_GET['order'])) {
                $orden['order'] = $_GET['order'];
            }
        }

        $comentprod = $this->model->getcomentprod($idcomentprod, $orden);

        $this->view->response($comentprod, 200);
    }

    public function delonecoment($params = [])
    {
        $idcoment = $params[':ID'];
        $coment = $this->model->getone($idcoment);

        // verifico que exista
        if (empty($coment)) {
            $this->view->response("no existe el comentario con id {$idcoment}", 404);
            die();
        }

        // si existe la elimina
        $this->model->delcoment($idcoment);
        $this->view->response("La tarea con id {$idcoment} se eliminó correctamente", 200);
    }
    public function getdata()
    {
        return json_decode($this->data);
    }



    public function addcoment()
    {
        // devuelve el JSOn enviado por POST
        $body = $this->getdata();
        // inserta el comentario
        $detalle = $body->detalle;
        $puntaje = $body->puntaje;
        $id_prod = $body->id_producto_fk;
        $idcoment = $this->model->addcoment($detalle, $puntaje, $id_prod);
        if (empty($idcoment)) {
            $this->view->response("La tarea no fue creada", 500);
            die;
        }
        $this->view->response("La tarea fue agregada correctamente con el id {$idcoment}", 200);
    }
}
