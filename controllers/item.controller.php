<?php

require_once 'models/item.model.php';
require_once 'views/item.view.php';
require_once 'helpers/auth.helper.php';
require_once 'views/error.view.php';


class ItemController {

    private $model;
    private $view;
    private $viewError;
    private $modelprod;

    public function __construct() {
        $this->model = new ItemModel();
        $this->view = new ItemView();
        $this->modelprod=new ProductModel();
        $this->viewError = new ErrorView();
        
    }
   
    public function showItems(){
        $rubros=$this->model->getItems();     
        $this->view->items($rubros);  // actualizo la vista
    }

    public function insertItem(){

        if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
      
            $nombre = $_POST['nombreItem']; // toma los valores enviados por el usuario
            
            $imagenitem = $_FILES['imagenrubro']["name"];
            $ubimagenrubro = $_FILES['imagenrubro']["tmp_name"];
            $nombrefinal ="images/imagesRubros/".uniqid("",true)."."
            . strtolower(pathinfo($imagenitem,PATHINFO_EXTENSION)); 
            move_uploaded_file($ubimagenrubro,$nombrefinal);
            $item = $this->model->getItemNombre($nombre); //verifica si el rubro está repetido
            if(!empty($item)) {
                $this->view->ErrorItemRepetido();
            }
            if(empty($nombre)&& empty($imagenitem)){
                $this->view->ErrorAlCargarItem();   //verifica si el campo está vacío
            } 
            if(empty($item) && !empty($nombre) && !empty($imagenitem)) {
                // inserta en la DB y redirige
                $success = $this->model->insertOneItem($nombre,$nombrefinal);    //inserta a la base de datos el rubro
                if($success){
                    header('Location: ' . BASE_URL . "listrubros");
                }
            }
        }
    }

   public function formItem(){
    if (AuthHelper::checkLogged()){ // si está logueado muestra el formulario de alta item
        $this->view->ShowFormByItem();
    }
   }

   public function deleteItem($rubro){
    if (AuthHelper::checkLogged()){
        $productos=$this->modelprod->getProductsByItem($rubro);
        if(empty($productos)){
            $this->model->borrarItem($rubro);
            header('Location: ' . BASE_URL . "listrubros");    //En BD Eliminación 
        }else
             $this->view->errorAlBorrarRubro();   
        
       
        
 
    }
}

   public function editItem($idItem){
    if (AuthHelper::checkLogged()){
        $item=$this->model->getItem($idItem);   //toma el item desde la BD
        if (!empty($item)){
            $this->view->showFormEdit($item);       //Muestra el formulario para editar con los datos precargados
        }else        
            $this->viewError->showError("Rubro Inexistente");
      }
    }

    public function itemEditado(){
        $nombre=$_POST['nombreItem'];
        $id=$_POST['iditem'];   //Se encuentra oculto
   
        $this->model->modifyItem($id,$nombre);
        header('Location: ' . BASE_URL . "listrubros");
   
    }
}
