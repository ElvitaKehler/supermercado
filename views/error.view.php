<?php

require_once('libs/Smarty.class.php');
require_once('views.php');

class ErrorView extends Views {
      
    public function showError($msg){ 
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->display('showError.tpl');
    
    }

}