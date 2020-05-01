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
            <title>Suprmercado LA WEB</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">Lista de Productos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="navbar-brand" href="lista_de_rubros">Lista de Rubros</a>
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
        echo '<ul class="list-group">';
        foreach ($productos as $producto) {
            
        //    $idTarea = $productos->id_producto;
    
            echo '<li class="list-group-item">';
    
            
            echo ' <b>' . $producto->nombre . "</b> - ";
            echo ' <b>' .$producto->marca. "</b> - ";
            echo ' <b>' .$producto->precio. "</b> - ";
        //    echo ' <a class="btn btn-info" href="ver/'.$idTarea.'">Ver</a>';
            echo '</li>';
        }
        echo '</ul>';
       
    }

    
}

class RubroView {

    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Suprmercado LA WEB</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">Lista de Productos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="navbar-brand" href="listarRubros">Lista de Rubros</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
    }

    

    public function showRubros($rubros){
        echo $this->encabezado();
        echo '<ul class="list-group">';
        foreach ($rubros as $rubro) {
            $idrubro=$rubro->id_rubro;
        //    $idTarea = $productos->id_producto;
    
            echo '<li class="list-group-item">';
    
            
            echo ' <b>' . $rubro->nombre . "</b> - ";
           
            echo '</li>';
            echo"</li>"."<a href='ProductosPorRubross/$idrubro' class='btn btn-link '>Productos del rubro  $rubro->nombre</a>";
        }
        echo '</ul>';
       
    }    
}
class ProductoPorRubroView{
    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Suprmercado LA WEB</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">Lista de Productos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="navbar-brand" href="listarRubros">Lista de Rubros</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
    }
    public function showProductosPorRubros($productos){
        echo $this->encabezado();
        echo '<ul class="list-group">';
        foreach ($productos as $producto) {            
        //    $idTarea = $productos->id_producto;    
            echo '<li class="list-group-item">';            
            echo ' <b>' . $producto->nombre . "</b> - ";
            echo ' <b>' .$producto->marca. "</b> - ";
            echo ' <b>' .$producto->precio. "</b> - ";
        //    echo ' <a class="btn btn-info" href="ver/'.$idTarea.'">Ver</a>';
            echo '</li>';
        }
        echo '</ul>';
    }
}
?>