<?php
require_once('libs/Smarty.class.php');

class ProductView {

    

    public function showProduct($productos,$esAdmin){
            
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listaProductos", $productos);
        $smarty->assign("esadmin",$esAdmin);
    
        $smarty->display('showProduct.tpl');
        
    }

    public function showProductRubros($productos){
       // var_dump($productos);die;
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listProductsByItem", $productos);

        $smarty->display('showProductRubros.tpl');
        
    }
    
    public function ViewOne($id){ 
    
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("identif", $id);

        $smarty->display('ViewOne.tpl');
    
        
    }

 
    public function showError($msg){
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("mensaje", $msg);

        $smarty->display('showError.tpl');
    
    }

    public function ShowFormByProduct($id){

        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("listarubros", $id);

        $smarty->display('ShowFormProductos.tpl');
    }
    public function showFormEditProduct($producto){
      
       
        $smarty = new Smarty();
        $smarty->assign("base_url", BASE_URL);
        $smarty->assign("producto", $producto);

        $smarty->display('editProduct.tpl');
    }
}