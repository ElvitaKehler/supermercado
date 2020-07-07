<?php

require_once('views.php');

class ErrorView extends Views {
      
    public function showError($msg,$msg2){ 
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->assign("mensaje2", $msg2);
        $this->smarty->display('showError.tpl');
    
    }

}