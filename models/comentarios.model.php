<?php

require_once('model.php');


class ComentModel extends Model{

    public function white_list(&$value, $allowed, $message) {      //para controlar valores permitidos
        if ($value === null) {
            return $allowed[0];
        }
        $key = array_search($value, $allowed, true);
        if ($key === false) { 
            throw new InvalidArgumentException($message); 
        } else {
            return $value;
        }
    }

  

   public function getAll($orden=[]) {

    $sort='fecha';
    $order='ASC';

    if(isset($orden['sort'])){           ///api/comentarios?sort=id_producto_fk&order=asc
        $sort= $orden['sort'];
        if (isset($orden['order'])){
            $order=$orden['order']; 
        }

    }
     //para evitar inyección SQL
    $sort = $this->white_list($sort, ["id_comentario","fecha","detalle","puntaje","id_producto_fk"], "Criterio de orden no valido");  
    $order = $this->white_list($order, ["ASC","DESC","asc","desc"], "Direccion de ORDER BY no valida");    


        // 1. abro la conexión con MySQL 
     //   $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sql="SELECT * FROM comentarios ORDER BY $sort $order";
        $sentencia = $this->db->prepare($sql); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $coments;
    }

    public function getAllOrdenPuntaje($orden){
        $sort='puntaje';
        $order='ASC';
    
        if(isset($orden['sort'])){           ///api/comentarios?sort=id_producto_fk&order=asc
            $sort= $orden['sort'];
            if (isset($orden['order'])){
                $order=$orden['order']; 
            }
    
        }
         //para evitar inyección SQL
        $sort = $this->white_list($sort, ["id_comentario","fecha","detalle","puntaje","id_producto_fk"], "Criterio de orden no valido");  
        $order = $this->white_list($order, ["ASC","DESC","asc","desc"], "Direccion de ORDER BY no valida");    
    
    
            // 1. abro la conexión con MySQL 
         //   $db = $this->createConection();
    
            // 2. enviamos la consulta (3 pasos)
            $sql="SELECT * FROM comentarios ORDER BY $sort $order";
            $sentencia = $this->db->prepare($sql); // prepara la consulta
            $sentencia->execute(); // ejecuta
            $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
            return $coments;

    }

    public function getAllOrdenComent($orden){
        $sort='detalle';
        $order='ASC';
    
        if(isset($orden['sort'])){           ///api/comentarios?sort=id_producto_fk&order=asc
            $sort= $orden['sort'];
            if (isset($orden['order'])){
                $order=$orden['order']; 
            }
    
        }
         //para evitar inyección SQL
        $sort = $this->white_list($sort, ["id_comentario","fecha","detalle","puntaje","id_producto_fk"], "Criterio de orden no valido");  
        $order = $this->white_list($order, ["ASC","DESC","asc","desc"], "Direccion de ORDER BY no valida");    
    
    
            // 1. abro la conexión con MySQL 
         //   $db = $this->createConection();
    
            // 2. enviamos la consulta (3 pasos)
            $sql="SELECT * FROM comentarios ORDER BY $sort $order";
            $sentencia = $this->db->prepare($sql); // prepara la consulta
            $sentencia->execute(); // ejecuta
            $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    
            return $coments;

    }
    
    public function getcomentprod($idcomentprod,$orden=[]){
        $sort='fecha';
        $order='ASC';
    
        if(isset($orden['sort'])){           
            $sort= $orden['sort'];
            if (isset($orden['order'])){
                $order=$orden['order']; 
            }
    
        }
         //para evitar inyección SQL
        $sort = $this->white_list($sort, ["id_comentario","fecha","detalle","puntaje"], "Criterio de orden no valido");  
        $order = $this->white_list($order, ["ASC","DESC","asc","desc"], "Direccion de ORDER BY no valida");  
        
     //   $db = $this->createConection(); // 1. abro la conexión con MySQL 

        //Creamos la consulta para obtener una categoria
        $sql="SELECT * FROM comentarios WHERE comentarios.id_producto_fk=? ORDER BY $sort $order ";
        $sentencia = $this->db->prepare($sql); // prepara la consulta          

        $sentencia->execute([$idcomentprod]); 
        $coments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
        return $coments;
    } 
       

    public function delcoment($idcoment){
       
        // 1. abro la conexión con MySQL 
     //   $db = $this->createConection();

        // 2. enviamos la consulta
        $sql="DELETE FROM comentarios  WHERE id_comentario = ?";
        $sentencia = $this->db->prepare($sql); // prepara la consulta
        $sentencia->execute([$idcoment]); // ejecuta 
        
        
  }

  public function getone($idcoment){
    // 1. abro la conexión con MySQL 
   // $db = $this->createConection();

    // 2. enviamos la consulta (3 pasos)
    $sql="SELECT * FROM comentarios WHERE id_comentario=?";
    $sentencia = $this->db->prepare($sql); // prepara la consulta
    $sentencia->execute([$idcoment]); // ejecuta
    $coment = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

    return $coment;
}

    public function addcoment($detalle,$puntaje,$id_prod){
        // 1. abro la conexión con MySQL 
       //  $db = $this->createConection();

        $sql="INSERT INTO comentarios(detalle, puntaje, id_producto_fk) VALUES(?,  ?, ?)";
        $sentencia = $this->db->prepare($sql); 
        $sentencia->execute([$detalle,$puntaje,$id_prod]);
        $lastID=$this->db->lastInsertID();
        
        return $lastID;
    }

}

