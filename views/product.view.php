<?php
require_once('libs/Smarty.class.php');

class ProductView {

    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="icon" href="images/image supermercado.jpg">

            <title>Supermercado LA WEB</title>
        </head>
        <body>
        <div  class="panel panel-primary">        
        <img src="images/image supermercado.jpg" class="rounded float-left" height="50" width="50" >       
        <img src="images/image supermercado.jpg" class="rounded float-right" height="50" width="50">  
        <h1 class="text-center"style="color:blue" > Supermercado LA WEB </h1>     
        </div>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="listar">Productos</ea>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="navbar-brand" href="listrubros">Rubros</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </li>
                <a class="navbar-brand" href="admin">Administrador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
}

public function showProduct($productos){
        
    $smarty = new Smarty();
    $smarty->assign("base_url", BASE_URL);
    $smarty->assign("listaProductos", $productos);
   
    $smarty->display('showProduct.tpl');
    
}

public function showProductRubros($productos){
      
      echo $this->encabezado();
      if(empty($productos)){
          echo'No hay productos de este rubro';
      }      
      else {$titulo=$productos[0]->rubro;
            

      echo "<h2> Rubro ".$titulo."</h2>";
            echo "<table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>";
     
    
      echo "<tr style='color:blue'><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr> ";  
      foreach ($productos as $producto) {            
            $id = $producto->id_producto;
            echo '<tr>';            
            echo ' <td><b>' . $producto->nombre . "</b></td> ";
            echo ' <td><b>' .$producto->marca. "</b> </td> ";
            echo ' <td><b>' .$producto->precio. "</b> </td> ";
            echo "<td> <a href='verproducto/$id' class='btn btn-link '>Ver</a>";
            echo '</tr>';
        }
        echo '</table>';
        }
       
}
 
public function ViewOne($id){ 
   
    echo $this->encabezado();
     $rubro =$id[0]->rubro; 
    $nombre=$id[0]->nombre;
    echo "<h1> Rubro: ".$rubro."</h1>";
    echo "<h2>".$nombre."</h2>";
   
    echo "<table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>";
     
    foreach ($id as $prod) {            
       
          echo '<tr>';            
          echo ' <td>Marca: <b>' .$prod->marca. "</b> </td> ";
          echo ' <td>Precio: <b>' .$prod->precio. "</b> </td> ";
          echo '</tr>';
      }
      echo '</table>';
     
}

public function ShowForm(){
    
        
        echo $this->encabezado();
        echo '<div class="container">
    
        <h1>Inserte un Producto</h1>
        <div class="row">
        <div class="col-6">
        <form action="altaprod" method="post" class="my-4">     
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombre" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>marca</label>
                    <input name="marca" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>precio</label>
                <input name="precio" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>id_rubro</label>
                <input name="id_rubro" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
        <div class="col-6">

        <h1>Inserte un Rubro</h1>
        <form action="altaItem" method="post" class="my-4">
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombreItem" type="text" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
        ';
        echo '</body>';
        echo  '</html>';
    
}

public function showError($msg){
        echo $this->encabezado();

        echo "<div class='text-center'>
            <h2>Error</h2>
            <h5>$msg</h5>
            <img src='images/image supermercado.jpg'height='50' width='50'>
          </div>";

        echo '<div class="text-center"><a class="" href="' . BASE_URL . 'alta">Volver</a></div>';

        echo '  
            </div>          
        </body>
    </html>
    ';
}

}

