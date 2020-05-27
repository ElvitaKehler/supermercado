<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'models/item.model.php';
require_once('helpers/auth.helper.php');

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
        $productos=$this->model->getAll(); // pido las tareas al MODELO
        $this->view->showProduct($productos); // actualizo la vista
    }

    public function showProductsByItem($rubro){
        $productos=$this->model->getProductsByItem($rubro);
        $this->view->showProductRubros($productos);  // $this->view->showProductRubros($productos, $esAdmin);estaba escrito así y daba error.
    }
    
    public function ViewProduct($id){
        $producto=$this->model->getone($id);
        $this->view->ViewOne($producto);
    }

  
    public function InsertProduct(){
        if (AuthHelper::checkLogged()){  //Barrera para usuario logueado
                                // toma los valores enviados por el usuario
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $precio = $_POST['precio'];
            $id_rubro = $_POST['id_rubro'];  
            if(empty($nombre)||empty($marca)||empty($precio)||empty($id_rubro)){
                $this->view->ErrorAlCargarProd();
            } 
            else{
                $producto=$this->model->getProductoNombre($nombre,$marca);
                if(!empty($producto)) {
                    $this->view->ProductoRepetido();                        
                }
                else{
                    // inserta en la DB y redirige
                    $success = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro);
                    if($success)
                        header('Location: ' . BASE_URL . "listar");
                }
            
            }
        }
    }
   

   public function deleteProduct($idproducto){
       if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
            $success = $this->model->borrarProducto($idproducto);
            if($success)
                header('Location: ' . BASE_URL . "listar");
       }
   }

   public function showError($msg){
    $this->view->showError($msg);

   }
   
   public function highProduct(){
        if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
            $rubros=$this->modelItem->getItems();
            $this->view->ShowFormByProduct($rubros);
         }
   }

   public function editProduct($idprod){
        if (AuthHelper::checkLogged()){  //Barrera para usuario logueado
            $producto=$this->model->getone($idprod);
            $this->view->showFormEditProduct($producto);

        }
        
    }

    public function productoEditado(){
            $idProduct=$_POST['idproducto'];
            $nombre = $_POST['nombreProducto'];
            $marca = $_POST['marcaProducto'];
            $precio = $_POST['precioProducto'];
            $id_rubro = $_POST['rubroProducto'];
        
    $this->model->modifyProducto($idProduct,$nombre,$marca,$precio,$id_rubro);
    $this-> showProducts();
    
    }
   
   public function inicialPage(){
        $this->view->showHome();
    }
}