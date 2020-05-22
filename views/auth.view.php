<?php

require_once('libs/Smarty.class.php');

class AuthView{
    
    public function showFormUser($error = null){

        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("error",$error);
        
        $smarty->display('ShowFormUser.tpl');
        
    }

}

