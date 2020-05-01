<?php

/**
 * Interactua con la tabla tareas
 */
class ProductModel {

    /**
     * Crear la conexion
     */
    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_supermercado';
        $pdo=new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        return $pdo;

     }


    /**
     * Devuelve todos los productos.
     */
    public function getAll() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM productos"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $productos;
    }


    public function getProductosPorRubros($rubro){
        // var_dump($rubro);die;  EL RUBRO LELGA OK!
      
        $db = $this->createConection(); // 1. abro la conexión con MySQL 


        //Creamos la consulta para obtener una categoria
        $sentencia = $db->prepare("SELECT productos.nombre, productos.marca, productos.precio, rubros.nombre as rubro
        FROM productos INNER JOIN rubros ON rubros.id_rubro=productos.id_rubro WHERE rubros.id_rubro=? ORDER BY productos.nombre ASC "); // prepara la consulta

        $sentencia->execute([$rubro]); // ejecuta --> LLEGA BIEN SIN FILTRAR POR RUBRO
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $productos;
    } 
    
}

class RubroModel{

    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_supermercado';
        $pdo=new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        return $pdo;

     }

    public function getRubros() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM rubros"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $rubros = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubros;
    }
}

?>  