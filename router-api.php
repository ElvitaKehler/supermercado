<?
require_once 'libs/router/Router.php';

$router =new Route();

//creo la tabla de ruteo

//Productos

$router->addRoute('productos','GET','ProdApiController','getprod');
$router->addRoute('productos/:ID','GET','ProdApiController','getoneprod');

//Rubros
$router->addRoute('rubros','GET','ItemApiController','getItms');
$router->addRoute('rubros/:ID','GET','ItemApiController','getoneitem');


//rutea

$router->route($_REQUEST['resource'],$_SERVER['request_method']); //recurso (productos, rubros...) y verbo (GET, POst....)
