<?php

require_once('model.php');

class AuthModel extends Model{

   /* private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_supermercado';
        $pdo=new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        return $pdo;

     }*/

     public function VerUserRegistrado($usuario) {

        
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? "); // prepara la consulta
        $sentencia->execute([$usuario]); // ejecuta
        return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        
        }
}