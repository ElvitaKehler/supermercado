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

    public function showProductsByItem($rubro){

        $productos=$this->model->getProductsByItem($rubro);
       
        
        // actualizo la vista
        $this->view->showProductRubros($productos);
    }
    
    public function ViewProduct($id){
        
        $producto=$this->model->getone($id);
       

        // actualizo la vista
        $this->view->ViewOne($producto);
    }

    public function AccessAdmin(){
        
        $this->view->ShowForm(); //MUESTRA LOS FORMULARIOS DE ALTA
      
    }
    public function InsertProduct(){
        
        // toma los valores enviados por el usuario
         $nombre = $_POST['nombre'];
         $marca = $_POST['marca'];
         $precio = $_POST['precio'];
         $id_rubro = $_POST['id_rubro'];  
   
        // inserta en la DB y redirige
        $success = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro);

        if($success)
            header('Location: ' . BASE_URL . "listar");
    }

    public function InsertItem(){
                    
        // toma los valores enviados por el usuario
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $id_rubro = $_POST['id_rubro'];  
                       

       // inserta en la DB y redirige
       $success = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro);

       if($success)
           header('Location: ' . BASE_URL . "listrubros");
   }

   public function showError($msg){
    $this->view->showError($msg);

   }
   
}
