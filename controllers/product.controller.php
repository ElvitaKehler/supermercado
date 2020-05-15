<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'models/item.model.php';
class ProductController {

    private $model;
    private $view;
    private $modelItem;
    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelItem = new ItemModel();
    }

    public function  showProducts(){
        // pido las tareas al MODELO
         $productos=$this->model->getAll();
         $esAdmin=true;                         //simulación de true=logueado o false NO Logueado.

        // actualizo la vista
        $this->view->showProduct($productos,$esAdmin);
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
           header('Location: ' . BASE_URL . "listar");
   }
   public function deleteProduct($idproducto){
    $success = $this->model->borrarProducto($idproducto);
    if($success)
    header('Location: ' . BASE_URL . "listar");
}

   public function showError($msg){
    $this->view->showError($msg);

   }
   public function highProduct(){
       $rubros=$this->modelItem->getItems();
       
        $this->view->ShowFormByProduct($rubros);

   }

   public function editProduct($idprod){
    $producto=$this->model->getone($idprod);
   
    $this->view->showFormEditProduct($producto);

}
public function productoEditado(){
        $idProduct=$_POST['idproducto'];
        $nombre = $_POST['nombreProducto'];
        $marca = $_POST['marcaProducto'];
        $precio = $_POST['precioProducto'];
        $id_rubro = $_POST['rubroProducto'];
    //    var_dump($idProduct,$nombre,$marca,$precio,$id_rubro);die;  
 $this->model->modifyProducto($idProduct,$nombre,$marca,$precio,$id_rubro);
 $this-> showProducts();
   
}
}