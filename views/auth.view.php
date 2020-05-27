<?php

require_once('libs/Smarty.class.php');
require_once('views.php');

class AuthView extends Views {
   /* private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
        $this->smarty->assign("esadmin",AuthHelper::userLogged());
    
    }*/
    
    public function showFormUser($error = null){

        $this->smarty->assign("error",$error);
        $this->smarty->display('ShowFormUser.tpl');
        
    }

}

