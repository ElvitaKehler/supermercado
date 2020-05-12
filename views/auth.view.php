<?php

require_once('libs/Smarty.class.php');

class AuthView{
    
    public function Verify(){

        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        
        $smarty->display('ShowFormUser.tpl');
        
    }

}

