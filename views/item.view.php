<?php
require_once('libs/Smarty.class.php');

class ItemView
{

    public function items($rubros,$esAdmin)    
    {
        //var_dump($rubros[0]->id_rubro);die; 
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listarubros", $rubros);
        $smarty->assign("esadmin",$esAdmin);

        $smarty->display('items.tpl');
    }

    

    public function showError($msg){
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("mensaje", $msg);

        $smarty->display('showError.tpl');
    
    }

    public function deleteItem($rubros)    
    {
        //var_dump($rubros[0]->id_rubro);die; 
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listarubros", $rubros);

        $smarty->display('items.tpl');
    }


    public function showFormEdit($item){     
       
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("item", $item);

        $smarty->display('editItem.tpl');
    }

    public function ShowFormByItem(){

        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        

        $smarty->display('ShowFormItems.tpl');
    }
}
