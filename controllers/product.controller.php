<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'models/item.model.php';
require_once 'helpers/auth.helper.php';
require_once 'views/error.view.php';

class ProductController {

    private $model;
    private $view;
    private $modelItem;
    private $viewError;
   
    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelItem = new ItemModel();
        $this->viewError = new ErrorView();
    }

    public function inicialPage(){
        $this->view->showHome();
    }

    public function  showProducts(){
        $productos=$this->model->getAll(); // pido TODAS las tareas al MODELO
        $this->view->showProduct($productos); // actualizo la vista
    }

    public function showProductsByItem($rubro){
        $productos=$this->model->getProductsByItem($rubro);
        $this->view->showProductRubros($productos);  
    }
    
    public function ViewProduct($id){
        $producto=$this->model->getone($id);
        if (!empty($producto)){
            $this->view->ViewOne($producto);
        }else
        $this->viewError->showError("Producto Inexistente");
        
    }

    public function formProduct(){
        if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
            $rubros=$this->modelItem->getItems();       // toma el rubro para el selector del formulario
            $this->view->ShowFormByProduct($rubros);
         }
   }

  
    public function InsertProduct(){

        if (AuthHelper::checkLogged()){  //Barrera para usuario logueado
                                
            $nombre = $_POST['nombre']; // toma los valores enviados por el usuario
            $marca = $_POST['marca'];
            $precio = $_POST['precio'];
            $id_rubro = $_POST['id_rubro'];  
            if(empty($nombre)||empty($marca)||empty($precio)||empty($id_rubro)){   //verifica que no haya campos vacíos
                $this->view->ErrorAlCargarProd();
            } 
            else{
                $producto=$this->model->getProductoNombre($nombre,$marca); // verifica si el producto ya fue cargado
                if(!empty($producto)) {
                    $this->view->ProductoRepetido();                        
                }
                else{
                    // inserta en la DB y redirige
                    $success = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro); //lo agrega a la base de datos
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

  
  

   public function editProduct($idprod){
        if (AuthHelper::checkLogged()){  //Barrera para usuario logueado
            $producto=$this->model->getone($idprod);        //devuelve los datos del producto para modificar los cambios
            if (!empty($producto)){
                $this->view->showFormEditProduct($producto);
            }else
                $this->viewError->showError("Producto Inexistente");
            

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
   
  
}