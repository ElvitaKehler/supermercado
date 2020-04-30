<?php

class ProductView {

   /* private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Lista de productos</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">TODOList</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="listar">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
    }

    public function showTasks($tareas) {

        echo $this->encabezado();
    
        echo '<div class="container">
    
                    <h1>Lista de Tareas</h1>
    
                    <form action="nueva" method="post" class="my-4">
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input name="titulo" type="text" class="form-control">
                                </div>
                            </div>
    
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Prioridad</label>
                                    <select name="prioridad" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"></textarea>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
        ';
    
    
        // arma la lista de tareas
        echo '<form method="post" action="finalizar">';
        echo '<ul class="list-group">';
        foreach ($tareas as $tarea) {
            
            $idTarea = $tarea->id_tarea;
    
            echo '<li class="list-group-item">';
    
            if ($tarea->finalizada != '1') {
                echo '<input type="checkbox" name="finalizar_'.$idTarea.'"/>';
            }
            echo ' <b>' . $tarea->titulo . "</b> - ";
    
            echo $tarea->descripcion;
            echo ' <a class="btn btn-info" href="ver/'.$idTarea.'">Ver</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '<input type="submit" class="btn btn-danger" value="Finalizar">';
        echo '</form>';
    
        echo '  
                </div>          
            </body>
        </html>
        ';
    }

    public function showTask($task) {

        $html = $this->encabezado();    

        $html .= '<div class="container">';
        $html .= '<h1>'. $task->titulo .'</h1>';
        $html .= '<p>'. $task->descripcion .'</p>';
        $html .= '<p> Prioridad:'. $task->prioridad .'</p>';

        if ($task->finalizada) {
            $html .= '<p> La tarea esta finalizada </p>';
        } else {
            $html .= '<p> La tarea NO esta finalizada </p>';
        }

        $html .= '<a href="'.BASE_URL . 'listar">Volver</a>';
        $html .= '</div>';
        $html .= '</body></html>';

        echo $html; 
    }

    /**
     * Muestra errores por pantalla
     */
    public function showError($msg) {
        echo $this->encabezado();

        echo "<h2>Error!</h2>";
        echo "<p>$msg</p>";
        echo "<img src='images/icon_task.png'>";
    }
}