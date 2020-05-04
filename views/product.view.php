<?php

class ProductView {

    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                </ul>
            </div>
            </nav>';
    
        return $html;
    }

    public function showProduct($productos){
        echo $this->encabezado();
       
        echo '<h2> Productos disponibles </h2>';

        echo "<table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>";
      
        echo "<tr style='color:blue'><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr> ";
        
       
        foreach ($productos as $producto) {
            $id = $producto->id_producto;
            echo '<tr>';
            echo ' <td> <b>' .$producto->nombre . "</b> </td>";
            echo ' <td> <b>' .$producto->marca. "</b> </td> ";
            echo ' <td> <b>' .$producto->precio. "</b> </td> ";
            echo "<td> <a href='verproducto/$id' class='btn btn-link '>Ver</a>";
            echo '</tr>';
        }
     //   echo "<td> <a href='listrubros' class='btn btn-link '>Volver a Rubros</a>";

       
       
    }

    public function showProductRubros($productos){
      
      echo $this->encabezado();
            
      $titulo=$productos[0]->rubro;
            

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
  
}

