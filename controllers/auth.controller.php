<?php
require_once 'views/auth.view.php';

class AuthController{
    
    private $view;

    public function __construct() {
        $this->view = new AuthView();
    }

    public function showLoguin(){
                
        $this->view->Verify();
    }
}