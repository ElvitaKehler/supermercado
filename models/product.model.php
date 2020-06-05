<?php

require_once('model.php');

class ProductModel extends Model {

    
    public function getAll() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM productos ORDER BY productos.nombre ASC"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $productos;
    }

    public function getProductsByItem($rubro){
        
        $db = $this->createConection(); // 1. abro la conexión con MySQL 

        //Creamos la consulta para obtener una categoria
        $sentencia = $db->prepare("SELECT productos.id_producto, productos.nombre, productos.marca, productos.precio,productos.imagen,rubros.id_rubro, rubros.nombre as rubro,rubros.imagen_rubro
        FROM productos INNER JOIN rubros ON rubros.id_rubro=productos.id_rubro WHERE rubros.id_rubro=? ORDER BY productos.nombre ASC "); // prepara la consulta

        $sentencia->execute([$rubro]); 
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
        return $productos;
    } 

    public function getone($id){
        
      
        $db = $this->createConection(); // 1. abro la conexión con MySQL 


        //Creamos la consulta para obtener una categoria
        $sentencia = $db->prepare("SELECT productos.id_producto, productos.nombre, productos.marca, productos.precio,productos.imagen, rubros.id_rubro, rubros.nombre as rubro
        FROM productos INNER JOIN rubros ON rubros.id_rubro=productos.id_rubro WHERE productos.id_producto=? ORDER BY productos.nombre ASC "); // prepara la consulta

        $sentencia->execute([$id]); // ejecuta -
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
     
        return $producto;
    }
    
    public function getProductoNombre($nombre,$marca){
        
      
        $db = $this->createConection(); // 1. abro la conexión con MySQL 


        //Creamos la consulta para obtener una categoria
        $sentencia = $db->prepare("SELECT * FROM productos WHERE nombre=? AND marca=? "); // prepara la consulta

        $sentencia->execute([$nombre,$marca]); // ejecuta -
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        
     
        return $producto;
    } 

    public function InsertOneProduct($nombre, $marca, $precio,$id_rubro,$imagen){
       
            // 1. abro la conexión con MySQL 
            $db = $this->createConection();
    
            // 2. enviamos la consulta
            $sentencia = $db->prepare("INSERT INTO productos(nombre, marca, precio, id_rubro,imagen) VALUES(?, ?, ?, ?,?)"); // prepara la consulta
            return $sentencia->execute([$nombre, $marca, $precio,$id_rubro,$imagen]); // ejecuta
            move_uploaded_file($_FILES["imagenprod"]["tmp_name"], "images/imagesProd");

    }
    public function borrarProducto($idproducto){
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM productos WHERE id_producto = ?"); // prepara la consulta
        $sentencia->execute([$idproducto]); // ejecuta 
        return $sentencia;
   }

   public function modifyProducto($id,$nombre,$marca,$precio,$id_rubro){
    // 1. abro la conexión con MySQL 
    $db = $this->createConection();

 // 2. enviamos la consulta (3 pasos)
 $sentencia = $db->prepare("UPDATE productos SET  nombre=? , marca=? , precio=? , id_rubro=? WHERE id_producto=?"); // prepara la consulta
 $sentencia->execute([$nombre,$marca,$precio,$id_rubro,$id]); // ejecuta
   } 
}
