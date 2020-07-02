<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'api/api.View.php';
class ProdApiController{

    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");//trae el cuerpo(body en postman) para agregar el comentario
    }

    public function getProductos(){
        $productos=$this->model->getAll();
        $this->view->response($productos,200);
    }

    public function getProductosPorItem($params = []){
        $rubro =  $params[':ID_RUBRO'];
        $productos=$this->model->getProductsByItem($rubro);
        if ($productos) {
            $this->view->response($productos,200);
        } else {
            $this->view->response("No existe el producto",404);
        }
    }

    public function getProducto($params = []){
        $id = $params[':ID'];
        $producto=$this->model->getone($id);       
        if ($producto) {
            $this->view->response($producto,200);
        } else {
            $this->view->response("No existe el producto con id {$id}",404);
        }       
    }

    public function getProductosPorNombre($params = []){
        $nombre= $params[':NOMBRE'];
        $marca = $params[':MARCA'];
        $producto=$this->model->getProductoNombre($nombre,$marca);
        if ($producto) {
            $this->view->response($producto,200);
        } else {
            $this->view->response("No existe el producto",404);
        }       

    }

    public function deleteProducto($params = []){
        $id = $params[':ID'];
        $producto=$this->model->borrarProducto($id);
        if ($producto) {
            $this->view->response($producto,200);
        } else {
            $this->view->response("No existe el producto con id {$id}",404);
        }       
    }

    public function getdata(){
        return json_decode($this->data);
        }

   
   
        public function agregarProducto($params = []){
        // devuelve el JSOn enviado por POST
        $body = $this->getdata();

        // inserta el comentario
        $nombre = $body->nombre;
        $marca = $body->marca;
        $precio = $body->precio;
        $id_rubro = $body->id_rubro;

        $idcoment = $this->model->InsertOneProduct($nombre, $marca, $precio,$id_rubro);

        if(empty($idcoment)){
            $this->view->response("El producto no fue creado", 500);
            die;
        }
        $this->view->response("El producto fue agregado correctamente con el id {$idcoment}", 200);
    }

    public function editarProducto($params = []){
        $id = $params[':ID'];
        $producto=$this->model->getone($id);
       //var_dump($producto);die;
        if ($producto){
            $body = $this->getdata();

        // inserta el comentario
        $nombre = $body->nombre;
        $marca = $body->marca;
        $precio = $body->precio;
        $id_rubro = $body->id_rubro;
        $imagen =$body->imagen;
        $resultado=$this->model->modifyProducto($id,$nombre,$marca,$precio,$id_rubro,$imagen);       
        $this->view->response("Producto id=$id actualizado con éxito", 200);
    }
    else 
        $this->view->response("No se actualizó el producto id=$id not found", 404);       
    } 
}

?>