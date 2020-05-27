<?php

require_once('libs/Smarty.class.php');
require_once('views.php');

class AuthView extends Views {
   
    
    public function showFormUser($error = null){

        $this->smarty->assign("error",$error);
        $this->smarty->display('ShowFormUser.tpl');
        
    }

}

