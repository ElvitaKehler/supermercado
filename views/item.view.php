<?php

class ItemView {

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
    <div >
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



public function rubros($rubros){
    echo $this->encabezado();
    
    echo '<ul class="list-group">';
    foreach ($rubros as $rubro) {
        $idrubro=$rubro->id_rubro;
       
        
        echo '<li class="list-group-item">';
        echo "<a href='productos_por_rubros/$idrubro' class='btn btn-link '>".strtoupper($rubro->nombre)."</a>";
    
        echo"</li>";
    }
    echo '</ul>';
   // echo "<a href='listar' class='btn btn-link '>Volver a Productos</a>";
   
}    
}

