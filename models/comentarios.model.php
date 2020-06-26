<?php

require_once('model.php');


class ComentModel extends Model{

  

   public function getAll() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sql="SELECT * FROM comentarios ORDER BY comentarios.id_producto_fk ASC ";
        $sentencia = $db->prepare($sql); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $coments;
    }
    public function getcomentprod($idcomentprod){
        
        $db = $this->createConection(); // 1. abro la conexión con MySQL 

        //Creamos la consulta para obtener una categoria
        $sql="SELECT * FROM comentarios WHERE comentarios.id_producto_fk=? ORDER BY comentarios.id_producto_fk ASC ";
        $sentencia = $db->prepare($sql); // prepara la consulta         FALTA la relación con la TABLA 

        $sentencia->execute([$idcomentprod]); 
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
        return $coments;
    } 
    

 /*   

    public function borrarITem($idrubro){
       
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM rubros  WHERE id_rubro = ?"); // prepara la consulta
        $sentencia->execute([$idrubro]); // ejecuta 
        return $sentencia;
        
  }

  public function getItem($idrubro){
    // 1. abro la conexión con MySQL 
    $db = $this->createConection();

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM rubros WHERE id_rubro=?"); // prepara la consulta
    $sentencia->execute([$idrubro]); // ejecuta
    $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $rubro;
}

public function getItemNombre($nombre){
    // 1. abro la conexión con MySQL 
    $db = $this->createConection();

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM rubros WHERE nombre=?"); // prepara la consulta
    $sentencia->execute([$nombre]); // ejecuta
    $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $rubro;
}

public function modifyItem($idrubro,$nombre,$imagen){


   // 1. abro la conexión con MySQL 
   $db = $this->createConection();

   // 2. enviamos la consulta (3 pasos)
   $sentencia = $db->prepare("UPDATE rubros SET nombre=? , imagen_rubro=? WHERE id_rubro=?"); // prepara la consulta
   $sentencia->execute([$nombre,$imagen,$idrubro]); // ejecuta
  

}*/
}

