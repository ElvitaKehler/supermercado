<?
require_once 'models/product.model.php';

class ProdApiController{
    private $model;

    function __construct(){
        $this->model = new ProductModel();
    }
    
    public function getprod(){
        echo 'llega a getprod';

    }

}