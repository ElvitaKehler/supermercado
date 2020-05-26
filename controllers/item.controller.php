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
        //barrera de seguridad
        $esAdmin=$this->checklogged();
        $rubros=$this->model->getItems();     
       
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
     //barrera de seguridad
     $esAdmin=$this->checklogged();

    $this->model->borrarItem($rubro);
    $rubros=$this->model->getItems();
      
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
private function checklogged(){
    session_start();
    if(!isset($_SESSION['ID_USER'])){
       $esAdmin=false;            
    }
    else{
        $esAdmin=true;
    }
    return $esAdmin;
}

}
