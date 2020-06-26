<?php


require_once 'libs/router/Router.php';
require_once 'api/coment.Api.Controller.php';

$router =new Router();

//creo la tabla de ruteo

//Comentarios

$router->addRoute('comentarios','GET','ComentApiController','getcoments'); // muestra todos los comentarios
$router->addRoute('comentarios/:ID','GET','ComentApiController','getcomentone'); //muestra los comentarios de un producto a partir del id del producto
$router->addRoute('comentarios/:ID','DELETE','ComentApiController','delonecoment'); // elimina un comentario a partir del id del comentario
$router->addRoute('comentarios','POST','ComentApiController','addcoments'); // agrega todos los comentarios


//rutea

$router->route($_REQUEST['resource'],$_SERVER['REQUEST_METHOD']); //recurso (productos, rubros...) y verbo (GET, POst....)

?>