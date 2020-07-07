<?php

require_once('model.php');

class AuthModel extends Model
{



  public function VerUserRegistrado($usuario)
  {


    $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? "); // prepara la consulta
    $sentencia->execute([$usuario]); // ejecuta
    return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

  }


  public function InsertarUsuario($nombre, $mail, $contrasenia, $tipo)
  {

    $sentencia = $this->db->prepare("INSERT INTO usuarios(nombre_usuario,mail,contrasenia,tipo) VALUES(?,?,?,?)"); // prepara la consulta
    return $sentencia->execute([$nombre, $mail, $contrasenia, $tipo]); // ejecuta

  }

  public function getUsers()
  {
    $sentencia = $this->db->prepare("SELECT * FROM usuarios "); // prepara la consulta
    $sentencia->execute(); // ejecuta
    return $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
  }

  public function delUser($user)
  {
    $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?"); // prepara la consulta
    $sentencia->execute([$user]); // ejecuta 
    return $sentencia;
  }

  public function getUser($id)
  {
    $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?"); // prepara la consulta
    $sentencia->execute([$id]); // ejecuta
    return $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
  }

  public function modifyUser($tipo, $id)
  {
    $sentencia = $this->db->prepare("UPDATE usuarios SET tipo=?  WHERE id_usuario=?"); // prepara la consulta
    $sentencia->execute([$tipo, $id]);
  }

  public function buscarUsuario($mail)
  {
    $sql = "SELECT * FROM usuarios WHERE mail = ?";
    $sentencia = $this->db->prepare($sql); // prepara la consulta
    $sentencia->execute([$mail]); // ejecuta
    $existe = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
    return $existe;
  }
}
