<?php
require_once('libs/Smarty.class.php');

class ProductView {

    

public function showProduct($productos){
        
    $smarty = new Smarty();
    $smarty->assign("base_url", BASE_URL);
    $smarty->assign("listaProductos", $productos);
   
    $smarty->display('showProduct.tpl');
    
}

public function showProductRubros($productos){

    $smarty = new Smarty();
    $smarty->assign("base_url", BASE_URL);
    $smarty->assign("listaProductos", $productos);

    $smarty->display('showProductRubros.tpl');
    
}
 
public function ViewOne($id){ 
  
    $smarty = new Smarty();
    $smarty->assign("base_url", BASE_URL);
    $smarty->assign("identif", $id);

    $smarty->display('ViewOne.tpl');
   
     
}

public function ShowForm(){
    $smarty = new Smarty();
    $smarty->assign("base_url", BASE_URL);
    
    $smarty->display('ShowForm.tpl');
      
}

public function showError($msg){
        echo $this->encabezado();

        echo "<div class='text-center'>
            <h2>Error</h2>
            <h5>$msg</h5>
            <img src='images/image supermercado.jpg'height='50' width='50'>
          </div>";

        echo '<div class="text-center"><a class="" href="' . BASE_URL . 'alta">Volver</a></div>';

        echo '  
            </div>          
        </body>
    </html>
    ';
}

}

