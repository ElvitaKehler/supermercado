<?php
require_once('libs/Smarty.class.php');

class ItemView
{

    public function items($rubros)    
    {
        //var_dump($rubros[0]->id_rubro);die; 
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listarubros", $rubros);

        $smarty->display('items.tpl');
    }

    public function ShowForm(){
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        
        $smarty->display('ShowForm.tpl');
        
    }

    public function showError($msg){
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("mensaje", $msg);

        $smarty->display('showError.tpl');
    
    }
}
