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
    
    public function getprod(){
        $tareas = $this->model->getAll();
        $this->view->response($tareas,200);

    }

}