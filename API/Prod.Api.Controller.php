<?
require_once 'models/product.model.php';
require_once 'API/APi.View.php';

class ProdApiController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
    }
    
    public function getprod($params = []){
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
    }



    

}