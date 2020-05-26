<?php
require_once('libs/Smarty.class.php');


class ProductView  {

   private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
    
    }

    
    public function showProduct($productos,$esAdmin){
            
        $this->smarty->assign("listaProductos", $productos);
        $this->smarty->assign("esadmin",$esAdmin);
        $this->smarty->display('showProduct.tpl');
        
    }

    public function showProductRubros($productos,$esAdmin){
      
        $this->smarty->assign("listProductsByItem", $productos);
        $this->smarty->assign("esadmin",$esAdmin);
        $this->smarty->display('showProductRubros.tpl');
        
    }
    
    public function ViewOne($id){ 
    
        $this->smarty->assign("identif", $id);
        $this->smarty->display('ViewOne.tpl');
    
        
    }

 
    public function showError($msg){
       
        $this->smarty->assign("mensaje", $msg);
        $this->smarty->display('showError.tpl');
    
    }

    public function ShowFormByProduct($id){

        $this->smarty->assign("listarubros", $id);
        $this->smarty->display('ShowFormProductos.tpl');
    }
    
    public function showFormEditProduct($producto){
      
    
        $this->smarty->assign("producto", $producto);
        $this->smarty->display('editProduct.tpl');
    }
    
    public function ErrorAlCargarProd(){
        
        $this->smarty->display('errorCargaProduct.tpl');
    }
    
    public function ProductoRepetido(){
        
        $this->smarty->display('errorProductoRepetido.tpl');
    }

    public function showHome(){
        
        $this->smarty->display('home.tpl');

}
}