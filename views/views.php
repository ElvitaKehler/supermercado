<?php


class Views {

    
   public $smarty;
   
   public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
        $this->smarty->assign("esadmin",AuthHelper::userLogged());
        $this->smarty->assign("usuario",AuthHelper::userName());
    
    }
}