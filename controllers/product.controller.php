<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';

class ProductController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function  showProducts(){
        // pido las tareas al MODELO
         $productos=$this->model->getAll();
        

        // actualizo la vista
        $this->view->showProduct($productos);
    }

    public function showProductosPorRubro($rubro){

        $productos=$this->model->getProductosPorRubros($rubro);
        
        // actualizo la vista
        $this->view->showProductRubros($productos);
    }
    
    

}
class RubroController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new RubroModel();
        $this->view = new RubroView();
    }
   
    public function showRubros(){

        $rubros=$this->model->getRubros();
        
        // actualizo la vista
        $this->view->rubros($rubros);
    }
}



?>