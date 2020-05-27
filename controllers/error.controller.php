<?php
require_once 'views/error.view.php';

class ErrorController{

    private $view;
    
   
    public function __construct() {
        $this->view = new ErrorView();
        
    }

    public function showError($msg){
        $this->view->showError($msg);
    
       }


}