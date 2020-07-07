<?php
require_once 'views/error.view.php';

class ErrorController
{

    private $view;


    public function __construct()
    {
        $this->view = new ErrorView();
    }

    public function showError($msg, $msg2 = NULL)
    {
        $this->view->showError($msg, $msg2);
    }

    public function showEgg()
    {
        $this->view->viewEgg();
    }
}
