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

    