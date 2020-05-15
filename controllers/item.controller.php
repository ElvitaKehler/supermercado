<?php

require_once 'models/item.model.php';
require_once 'views/item.view.php';


class ItemController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ItemModel();
        $this->view = new ItemView();
    }
   
    public function showItems(){

        $rubros=$this->model->getItems();
        $esAdmin=true;                          //simulación de true=logueado o false NO Logueado.
       
       
        // actualizo la vista
        $this->view->items($rubros,$esAdmin);
    }

    public function insertItem(){
      
        // toma los valores enviados por el usuario
        
        $nombre = $_POST['nombreItem'];
       // var_dump($nombre);die;
        if(empty($nombre)){
            $this->view->ErrorAlCargarItem();
            
        } 
        else{
                $item = $this->model->getItemNombre($nombre);
                //    var_dump($item);die;
                if(!empty($item)) {
                    $this->view->ErrorItemRepetido();
                           
                }
                 else { 
                           // inserta en la DB y redirige
                        $success = $this->model->insertOneItem($nombre);
                        if($success){
                            header('Location: ' . BASE_URL . "listrubros");
                        }
                }
        }
    }
   public function highItem(){
    
       
    $this->view->ShowFormByItem();

   }

   public function deleteItem($rubro){
    
    $this->model->borrarItem($rubro);
    $rubros=$this->model->getItems();
    $esAdmin=true;   
    $this->view->items($rubros,$esAdmin);

   }
   public function editItem($idItem){
    $item=$this->model->getItem($idItem);
   
    $this->view->showFormEdit($item);

}
public function itemEditado(){
    $nombre=$_POST['nombreItem'];
    $id=$_POST['iditem'];
    $ItemEdit=$this->model->getItems($nombre);
    /*if(!empty($ItemEdit)){
        echo"Error el item ya existe";
        echo"   ";
    }
    else{*/
        $this->model->modifyItem($id,$nombre);
        $this->showItems();
   // }
 
}

}



?>