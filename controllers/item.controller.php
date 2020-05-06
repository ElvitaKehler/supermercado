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
        
        // actualizo la vista
        $this->view->rubros($rubros);
    }

    public function insertItem(){
      
        // toma los valores enviados por el usuario
        $nombre = $_POST['nombreItem'];
                

       // inserta en la DB y redirige
       $success = $this->model->insertOneItem($nombre);

       if($success)
           header('Location: ' . BASE_URL . "listar");

      

   }
   public function highItem()
   {
       // actualizo la vista
       $this->view->ShowForm();
   }
}



?>