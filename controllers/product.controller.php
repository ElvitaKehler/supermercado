<?php
require_once 'models/product.model.php';
require_once 'models/comentarios.model.php';
require_once 'views/product.view.php';
require_once 'models/item.model.php';
require_once 'helpers/auth.helper.php';
require_once 'views/error.view.php';
require_once 'libs/smarty/Smarty.class.php';
require_once 'models/img.model.php';

class ProductController {

    private $model;
    private $view;
    private $modelItem;
    private $modelImg;
    private $viewError;
    private $modelcoment;
   
    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelItem = new ItemModel();
        $this->modelImg = new ImagenModel();
        $this->viewError = new ErrorView();
        $this->modelcoment = new ComentModel();
    }

    public function inicialPage(){
        $this->view->showHome();
    }

    public function  showProducts(){
        $productos=$this->model->getAll(); // pido TODAS las tareas al MODELO
        $this->view->showProduct($productos); // actualizo la vista
    }

    public function showProductsByItem($idrubro){
        $productos=$this->model->getProductsByItem($idrubro);
        $imag=$this->modelImg->GetImages($idrubro);
        $this->view->showProductRubros($productos,$imag);  
    }
    
    public function ViewProduct($id){
        $producto=$this->model->getone($id);
       //var_dump($producto);die;
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
            $imagenprod = $_FILES['imagenprod']["name"];
           
            $ubimagenprod = $_FILES['imagenprod']["tmp_name"];
           // print_r($_POST);
            //print_r($_FILES);die;
            $nombrefinal ="images/imagesProd/".uniqid("",true)."."
            . strtolower(pathinfo($imagenprod,PATHINFO_EXTENSION)); 
            
            move_uploaded_file($ubimagenprod,$nombrefinal);
            $producto=$this->model->getProductoNombre($nombre,$marca); // verifica si el producto ya fue cargado
            if(!empty($producto)) {
                $this->view->ProductoRepetido();                        
            } 
            if(empty($producto) && (empty($nombre)||empty($marca)||empty($precio)||empty($id_rubro)||empty($imagenprod))){   //verifica que no haya campos vacíos
                $this->view->ErrorAlCargarProd();
            } 
            if(empty($producto) && !empty($nombre) && !empty($marca)&& !empty($precio) && !empty($id_rubro)&& !empty($imagenprod)){       
                 // inserta en la DB y redirige
                 $idproducto = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro,$nombrefinal); //lo agrega a la base de datos
                 //$idimagen =  $this->modelImagen->InsertImagen($idproducto,$nombrefinal);
                
                    header('Location: ' . BASE_URL . "listar");
            }
        }
    }
   

   public function deleteProduct($idproducto){
       if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
            $success = $this->model->borrarProducto($idproducto);
            $comentarios=$this->modelcoment->getComentsByProduct($idproducto);           
            if(empty($comentarios) && $success){
                header('Location: ' . BASE_URL . "listar");
            }else{
                $this->view->errorAlBorrarProducto("No puede borrar el producto porque tiene comentarios, borre los comentarios primero");die;   
            }
       }
   }

   public function deleteImagenProduct($idproducto){
    if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
       
        $ruta =$this->model->obtenerRutaImagen($idproducto);
        unlink($ruta->imagen);
       
        $success = $this->model->borrarImagenProducto($idproducto);
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
            $imagenprod = $_FILES['imagenprod']["name"];
            if(!empty($imagenprod)){
            //var_dump($imagenprod);
            $ubimagenprod = $_FILES['imagenprod']["tmp_name"];
            $nombrefinal ="images/imagesProd/".uniqid("",true)."."
            . strtolower(pathinfo($imagenprod,PATHINFO_EXTENSION));
            //var_dump($nombrefinal);die; 
            move_uploaded_file($ubimagenprod,$nombrefinal);
            }
            if(!empty($nombrefinal)){
                $this->model->modifyProducto($idProduct,$nombre,$marca,$precio,$id_rubro,$nombrefinal);
            }
            else{
                $this->model->modifyProducto($idProduct,$nombre,$marca,$precio,$id_rubro);
            }
           
            $this-> showProducts();
    
    }
   
  
}