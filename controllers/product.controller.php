<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';

class ProductController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function  showProducts(){
        // pido las tareas al MODELO
         $productos=$this->model->getAll();
        

        // actualizo la vista
        $this->view->showProduct($productos);
    }
    
    /*
    public function viewTask($idTask) {
        $task = $this->model->get($idTask);

        if (!empty($task)) // verifico que exista la tarea
            $this->view->showTask($task);
        else
            $this->view->showError("La tarea no existe");
    }

    function addTask() {
        // toma los valores enviados por el usuario
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $prioridad = $_POST['prioridad'];
    
        // verifica los datos obligatorios
        if (!empty($titulo) && !empty($prioridad)) {
            // inserta en la DB y redirige
            $this->model->insert($titulo, $descripcion, $prioridad);
            header('Location: ' . BASE_URL . "listar");
        } else {
            $this->view->showError("ERROR! Faltan datos obligatorios");
        }
    }

    function finalizeTasks() {
        // Array ( [finalizar_23] => on [finalizar_25] => on [finalizar_26] => on ) 
        foreach ($_POST as $index => $lemento) {
            $vars = explode('_', $index);

            // $vars[0] = 'finalizar', $var[1] = 23
            $idTask = $vars[1];
            $this->model->finalize($idTask);
        }

        header('Location: ' . BASE_URL . "listar"); 
    }
    */

}
class RubroController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new RubroModel();
        $this->view = new RubroView();
    }
    public function showRubros(){

        $rubros=$this->model->getRubros();
        

        // actualizo la vista
        $this->view->showRubros($rubros);
    }
}
class ProdPorRubroController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductoPorRubroModel();
        $this->view = new ProductoPorRubroView();
    }
    public function showProductosPorRubros(){

        $productos=$this->model->getProductosPorRubros();
        

        // actualizo la vista
        $this->view->showProductosPorRubros($productos);
    }
}

?>