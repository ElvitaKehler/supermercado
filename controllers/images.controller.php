<?php

require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'controllers/product.controller.php';
require_once 'models/imagenprod.model.php';
require_once 'helpers/auth.helper.php';


class ImagesController{

    private $model;
    private $view;
    private $modelItem;
    private $modelImagen;
    private $viewError;
   
    public function __construct() {
        $this->model = new ImagenProdModel;
        $this->view = new ProductView();    
       
        $this->viewError = new ErrorView();
    }

    function addImages($id){
        if (AuthHelper::checkLogged()){

            if ($_FILES['image']['name'] == null){
                header('Location: ' . BASE_URL . "listar");
            }else{
                if ($_FILES['image']['name']) {
                    if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png") {
                        $this->model->addImages($id,$_FILES['image']);              
                    }
                }
            }
            header('Location: ' . BASE_URL . "listar");
        }
    }
        
}
?>