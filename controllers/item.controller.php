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
}



?>