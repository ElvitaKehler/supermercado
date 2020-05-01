<?php
    require_once 'controllers/product.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'lista de productos';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'lista de productos': // /lista los productos   ->   showProd()
            // instanciando un objeto de la clase ProdController
            $controller = new ProductController();
            $controller->showProducts();
        break;

        case 'lista_de_rubros': // /lista los rubros   ->   showRubros()
            // instanciando un objeto de la clase RubroController
            $controller = new RubroController();
            $controller->showRubros();
        break;
        case 'productos_por_rubros': // /lista productos por rubro   ->   showRubros()
            // instanciando un objeto de la clase RubroController
            $controller = new ProdPorRubroController();
            $controller->showProductosPorRubro();
        break;


         default: 
            echo "404 not found";
        break;
    }