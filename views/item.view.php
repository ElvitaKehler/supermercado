<?php
require_once('libs/Smarty.class.php');

class ItemView{

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
    
    }

    public function items($rubros,$esAdmin){
        $this->smarty->assign("listarubros", $rubros);
        $this->smarty->assign("esadmin",$esAdmin);
        $this->smarty->display('items.tpl');
    }

    

    public function showError($msg){   
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->display('showError.tpl');
    
    }

    public function deleteItem($rubros){
        $this->smarty->assign("listarubros", $rubros);
        $this->smarty->display('items.tpl');
    }


    public function showFormEdit($item){          
        $this->smarty->assign("item", $item);
        $this->smarty->display('editItem.tpl');
    }

    public function ShowFormByItem(){
        $this->smarty->display('ShowFormItems.tpl');
    }

    public function ErrorAlCargarItem(){
        $this->smarty->display('errorCargaItem.tpl');
    }

    public function ErrorItemRepetido(){
        $this->smarty->display('errorItemRepetido.tpl');
    }
    
}
