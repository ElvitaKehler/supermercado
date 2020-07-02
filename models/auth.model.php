<?php

require_once('model.php');

class AuthModel extends Model{

   

     public function VerUserRegistrado($usuario) {
        
        // 1. abro la conexión con MySQL 
    //    $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? "); // prepara la consulta
        $sentencia->execute([$usuario]); // ejecuta
        return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        
        }


     public function InsertarUsuario($nombre,$contrasenia,$tipo) {      
        
                // 1. abro la conexión con MySQL 
              //  $db = $this->createConection();      
           
    
                // 2. enviamos la consulta
                $sentencia = $this->db->prepare("INSERT INTO usuarios(nombre_usuario,contrasenia,tipo) VALUES(?,?,?)"); // prepara la consulta
                return $sentencia->execute([$nombre,$contrasenia,$tipo]); // ejecuta
                
      }

      public function getUsers(){
          $sentencia = $this->db->prepare("SELECT * FROM usuarios "); // prepara la consulta
          $sentencia->execute(); // ejecuta
          return $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
      }

      public function delUser($user){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?"); // prepara la consulta
        $sentencia->execute([$user]); // ejecuta 
        return $sentencia;
      }

      public function getUser($id){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?"); // prepara la consulta
          $sentencia->execute([$id]); // ejecuta
          return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
      }

      public function modifyUser($nameUser,$tipo,$id){
        $sentencia = $this->db->prepare("UPDATE usuarios SET  nombre_usuario=? , tipo=?  WHERE id_usuario=?"); // prepara la consulta
        $sentencia->execute([$nameUser,$tipo,$id]);
      }
}