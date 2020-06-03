<?
require_once 'libs/router/Router.php';
require_once 'API/Prod.Api.Controller.php';

$router =new Router();

//creo la tabla de ruteo

//Productos

$router->addRoute('productos','GET','ProdApiController','getprod');
$router->addRoute('productos/:ID','GET','ProdApiController','getoneprod');

//Rubros
//$router->addRoute('rubros','GET','ItemApiController','getItms');
//$router->addRoute('rubros/:ID','GET','ItemApiController','getoneitem');

//Usuarios
//$router->addRoute('usuarios','GET','UserApiController','getUsers');
//$router->addRoute('usuarios/:ID','GET','UserApiController','getoneuser');


//rutea

$router->route($_REQUEST['resource'],$_SERVER['REQUEST_METHOD']); //recurso (productos, rubros...) y verbo (GET, POst....)
