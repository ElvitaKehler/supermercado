<?php


require_once 'libs/router/Router.php';
require_once 'api/coment.Api.Controller.php';
require_once 'api/productos.Api.Controller.php';

$router =new Router();

//creo la tabla de ruteo

//Comentarios

$router->addRoute('comentarios','GET','ComentApiController','getcoments'); // muestra todos los comentarios ordenados por fecha
$router->addRoute('productos/:ID/comentarios','GET','ComentApiController','getcomentone'); //muestra los comentarios de un producto a partir del id del producto
$router->addRoute('comentarios/:ID','DELETE','ComentApiController','delonecoment'); // elimina un comentario a partir del id del comentario
$router->addRoute('comentarios','POST','ComentApiController','addcoment'); // agrega un comentario




$router->addRoute('productos','GET','ProdApiController','getProductos'); 
$router->addRoute('productos/rubro/:ID_RUBRO','GET','ProdApiController','getProductosPorItem');
$router->addRoute('productos/nombre/:NOMBRE/:MARCA','GET','ProdApiController','getProductosPorNombre');  
$router->addRoute('productos/:ID','GET','ProdApiController','getProducto'); 
$router->addRoute('productos/:ID','DELETE','ProdApiController','deleteProducto');
$router->addRoute('productos','POST','ProdApiController','agregarProducto');
$router->addRoute('productos/:ID','PUT','ProdApiController','editarProducto');

//rutea

$router->route($_REQUEST['resource'],$_SERVER['REQUEST_METHOD']); //recurso (productos, rubros...) y verbo (GET, POst....)

?>