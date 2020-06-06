<?php

require_once('model.php');

class AuthModel extends Model{

   

     public function VerUserRegistrado($usuario) {
        
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? "); // prepara la consulta
        $sentencia->execute([$usuario]); // ejecuta
        return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        
        }


     public function InsertarUsuario($nombre,$contrasenia) {      
        
                // 1. abro la conexión con MySQL 
                $db = $this->createConection();      
           
    
                // 2. enviamos la consulta
                $sentencia = $db->prepare("INSERT INTO usuarios(nombre_usuario,contrasenia) VALUES(?,?)"); // prepara la consulta
                return $sentencia->execute([$nombre,$contrasenia]); // ejecuta
                
        }
}