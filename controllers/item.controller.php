<?php

require_once 'models/item.model.php';
require_once 'views/item.view.php';
require_once('helpers/auth.helper.php');


class ItemController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ItemModel();
        $this->view = new ItemView();
    }
   
    public function showItems(){
        $rubros=$this->model->getItems();     
        $this->view->items($rubros);  // actualizo la vista
    }

    public function insertItem(){

        if (AuthHelper::checkLogged()){ //Barrera para usuario logueado
      
            $nombre = $_POST['nombreItem']; // toma los valores enviados por el usuario
            if(empty($nombre)){
                $this->view->ErrorAlCargarItem();
            } 
            else{
                    $item = $this->model->getItemNombre($nombre);
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
    }

   public function formItem(){
    if (AuthHelper::checkLogged()){
        $this->view->ShowFormByItem();
    }
   }

   public function deleteItem($rubro){
    if (AuthHelper::checkLogged()){
         $this->model->borrarItem($rubro);
         $rubros=$this->model->getItems();
         $this->view->items($rubros); 
    }
}

   public function editItem($idItem){
    if (AuthHelper::checkLogged()){
        $item=$this->model->getItem($idItem);
    
        $this->view->showFormEdit($item);
      }
    }

    public function itemEditado(){
    $nombre=$_POST['nombreItem'];
    $id=$_POST['iditem'];
    //$ItemEdit=$this->model->getItems($nombre);
   
        $this->model->modifyItem($id,$nombre);
        $this->showItems();
   
    }
}
