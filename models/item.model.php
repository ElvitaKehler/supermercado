<?php

require_once('model.php');


class ItemModel extends Model{

  

    public function getItems() {
        // 1. abro la conexión con MySQL 
      //  $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $this->db->prepare("SELECT * FROM rubros ORDER BY rubros.nombre ASC "); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $rubros = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubros;
    }
    public function InsertOneItem($nombre,$imagen){
       
        // 1. abro la conexión con MySQL 
      //  $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $this->db->prepare("INSERT INTO rubros(nombre,imagen_rubro) VALUES(?,?)"); // prepara la consulta
        return $sentencia->execute([$nombre,$imagen]); // ejecuta
    }

    public function borrarITem($idrubro){
       
        // 1. abro la conexión con MySQL 
     //   $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $this->db->prepare("DELETE FROM rubros  WHERE id_rubro = ?"); // prepara la consulta
        $sentencia->execute([$idrubro]); // ejecuta 
        return $sentencia;
        
  }

  public function getItem($idrubro){
    // 1. abro la conexión con MySQL 
   // $db = $this->createConection();

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $this->db->prepare("SELECT * FROM rubros WHERE id_rubro=?"); // prepara la consulta
    $sentencia->execute([$idrubro]); // ejecuta
    $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $rubro;
}

public function getItemNombre($nombre){
    // 1. abro la conexión con MySQL 
  //  $db = $this->createConection();

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $this->db->prepare("SELECT * FROM rubros WHERE nombre=?"); // prepara la consulta
    $sentencia->execute([$nombre]); // ejecuta
    $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $rubro;
}

public function modifyItem($idrubro,$nombre,$imagen){


   // 1. abro la conexión con MySQL 
  // $db = $this->createConection();

   // 2. enviamos la consulta (3 pasos)
   $sentencia = $this->db->prepare("UPDATE rubros SET nombre=? , imagen_rubro=? WHERE id_rubro=?"); // prepara la consulta
   $sentencia->execute([$nombre,$imagen,$idrubro]); // ejecuta
  

}
}

