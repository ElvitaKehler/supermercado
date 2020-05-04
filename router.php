<?php
    require_once 'controllers/product.controller.php';
    require_once 'controllers/item.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'listar';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'listar': // /lista los productos   ->   showProd()
            // instanciando un objeto de la clase ProdController
            $controller = new ProductController();
            $controller->showProducts();
        break;

        case 'listrubros': // /lista los rubros   ->   showRubros()
            // instanciando un objeto de la clase RubroController
            $controller = new ItemController();
            $controller->showItems();
        break;
        case 'productos_por_rubros': // /lista productos por rubro /n  ->   showRubrosPOrRubro()
            // instanciando un objeto de la clase RubroController
            $controller = new ProductController();            
            $controller->showProductsByItem($parametros[1]);
        break;
        case 'verproducto': // /ver el detalle de un producto/n  ->   ViewProduct()
            // instanciando un objeto de la clase RubroController
           
            $controller = new ProductController();            
            $controller->ViewProduct($parametros[1]);
            
        break;


         default: 
            echo "404 not found";
        break;
    }