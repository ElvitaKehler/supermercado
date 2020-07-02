<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'api/api.View.php';
class ProdApiController{

    private $model;
    private $view;
    private $errorview;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
      $this->errorview =new ProductView; 
    }

    public function getProductos(){
        $productos=$this->model->getAll();
        $this->view->response($productos,200);
    }

    public function getProductosPorItem($params = []){
        $rubro =  $params[':ID_RUBRO'];
        $productos=$this->model->getProductsByItem($rubro);
        if ($productos) {
            $this->view->response($productos,200);
        } else {
            $this->view->response("No existe el producto",404);
        }
    }

    public function getProducto($params = []){
        $id = $params[':ID'];
        $productos=$this->model->getone($id);
        if ($productos) {
            $this->view->response($productos,200);
        } else {
            $this->view->response("No existe el producto con id {$id}",404);
        }       
    }

    public function getProductosPorNombre($params = []){
        $nombre= $params[':NOMBRE'];
        $marca = $params[':MARCA'];
        $producto=$this->model->getProductoNombre($nombre,$marca);
        if ($producto) {
            $this->view->response($producto,200);
        } else {
            $this->view->response("No existe el producto",404);
        }       

    }

    public function deleteProducto($params = []){
        $id = $params[':ID'];
        $producto=$this->model->borrarProducto($id);
        if ($producto) {
            $this->view->response($producto,200);
        } else {
            $this->view->response("No existe el producto con id {$id}",404);
        }       
    }


}

?>