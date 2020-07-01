<?php
    require_once 'controllers/product.controller.php';
    require_once 'controllers/item.controller.php';
    require_once 'controllers/auth.controller.php';
    require_once 'controllers/error.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'inicio';
    } 
     

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {

        //ACCIONES DE ACCESO PÚBLICO

        case 'inicio':              //Muestra el Home de la página
            $controller=new ProductController();
            $controller->inicialPage();
        break;
       
        case 'listar':              // Muestra TODOS los productos  
            $controller = new ProductController();
            $controller->showProducts();
        break;

        case 'listrubros':          //Muestra TODOS los rubros
            $controller = new ItemController();
            $controller->showItems();
        break;

        case 'productos_por_rubros': // Muestra productos de un rubro específico
            $controller = new ProductController();            
            $controller->showProductsByItem($parametros[1]);
        break;

        case 'verproducto':          //Muestra el detalle de un producto
            $controller = new ProductController();            
            $controller->ViewProduct($parametros[1]);
        break;

        //ACCIONES DE ACCESO USUARIO LOGUEADO
        
        case 'formAltaProducto':    //Muestra el formulario para insertar producto
            $controller = new ProductController();
            $controller->formProduct();  
        break;
        
        case 'altaprod':    //Alta a nuevo producto, desde ACTION del formulario
            $controller = new ProductController();
            $controller->InsertProduct();
        break;

        case 'formAltaItem':  //Muestra el formulario para insertar un nuevo rubro
            $controller = new ItemController();
            $controller->formItem();     
        break;

        case 'altaItem':  //Alta a nuevo rubro, desde ACTION del formulario
            $controller = new ItemController();
            $controller->insertItem();
        break;

        case 'editar_producto':  //Muestra el formulario para editar un producto
            $controller = new ProductController();
            $controller->editProduct($parametros[1]);
        break;

        case 'productoEditado':  //Edita el producto, desde ACTION del formulario
            $controller = new ProductController();
            $controller->productoEditado();
        break;

        case 'borrar_producto':  //Elimina un producto de la BD
            $controller = new ProductController();
            $controller->deleteProduct($parametros[1]);
        break;

        case 'borrarimagenprod':  //Elimina un producto de la BD
            $controller = new ProductController();
            $controller->deleteImagenProduct($parametros[1]);
        break;

        case 'editar_rubro':    //Muestra el formulario para editar un rubro
            $controller = new ItemController();
            $controller->editItem($parametros[1]);
        break;

        case 'rubroEditado':  //Edita el rubro, desde ACTION del formulario
            $controller = new ItemController();
            $controller->itemEditado();
        break;

        case 'borrar_rubro':  //Elimina el rubro de la BD
            $controller = new ItemController();
            $controller->deleteItem($parametros[1]);
        break;

    //ACIONES DE AUTENTICACIÓN

        case 'login':       // Muestra el formulario de Logueo
            $controller = new AuthController();
            $controller-> ShowLogin();
        break;

        case 'verifyUser':  //Verifica usuario existente, desde ACTION del formulario
            $controller = new AuthController();
            $controller-> verifyUser();
        break;

        case 'cerrar_sesion': //Cierra la sesión logueada.
            $controller = new AuthController();
            $controller-> endSesion();
        break;
        
        default: 
         $controller = new ErrorController();
         $controller->showError("404 not found");
        break;

    //ACIONES DE REGISTRO
    
        case 'registroUsuario':       // Muestra el formulario de REGISTRO
            $controller = new AuthController();
            $controller-> ShowFormRegistro();
        break;

        case 'registrarUsuario':  //Registra al usuario , desde ACTION del formulario
            $controller = new AuthController();
            $controller-> RegistrarUsuario();
        break;
    }