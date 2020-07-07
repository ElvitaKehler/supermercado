<?php

require_once('model.php');

class ProductModel extends Model
{


    public function getAll()
    {

        $sentencia = $this->db->prepare("SELECT * FROM productos ORDER BY productos.nombre ASC"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $productos;
    }

    public function getProductsByItem($rubro)
    {


        $sentencia = $this->db->prepare("SELECT productos.id_producto, productos.nombre, productos.marca, productos.precio,productos.imagen,rubros.id_rubro, rubros.nombre as rubro,rubros.imagen_rubro
        FROM productos INNER JOIN rubros ON rubros.id_rubro=productos.id_rubro WHERE rubros.id_rubro=? ORDER BY productos.nombre ASC "); // prepara la consulta

        $sentencia->execute([$rubro]);
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $productos;
    }

    public function getone($id)
    {


        $sentencia = $this->db->prepare("SELECT productos.id_producto, productos.nombre, productos.marca, productos.precio,productos.imagen, rubros.id_rubro, rubros.nombre as rubro
        FROM productos INNER JOIN rubros ON rubros.id_rubro=productos.id_rubro WHERE productos.id_producto=? ORDER BY productos.nombre ASC "); // prepara la consulta

        $sentencia->execute([$id]); // ejecuta -
        $producto = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta


        return $producto;
    }

    public function getProductoNombre($nombre, $marca)
    {


        $sentencia = $this->db->prepare("SELECT * FROM productos WHERE nombre=? AND marca=? "); // prepara la consulta

        $sentencia->execute([$nombre, $marca]); // ejecuta -
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta


        return $producto;
    }

    public function InsertOneProduct($nombre, $marca, $precio, $id_rubro)
    {


        $sentencia = $this->db->prepare("INSERT INTO productos(nombre, marca, precio, id_rubro) VALUES(?, ?, ?, ?)"); // prepara la consulta
        $sentencia->execute([$nombre, $marca, $precio, $id_rubro]); // ejecuta
        return $this->db->lastInsertId();
    }
    public function borrarProducto($idproducto)
    {

        $sentencia = $this->db->prepare("DELETE FROM productos WHERE id_producto = ?"); // prepara la consulta
        $sentencia->execute([$idproducto]); // ejecuta 
        return $sentencia;
    }

    public function borrarImagenProducto($id)
    {

        $sentencia = $this->db->prepare("UPDATE productos SET imagen = '' WHERE id_producto=?"); // prepara la consulta
        $sentencia->execute([$id]); // ejecuta 
        return $sentencia;
    }

    public function obtenerRutaImagen($idproducto)
    {

        $sentencia = $this->db->prepare("SELECT  productos.imagen FROM productos WHERE id_producto=?  "); // prepara la consulta

        $sentencia->execute([$idproducto]); // ejecuta -
        $rutaimagen = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta


        return $rutaimagen;
    }

    public function modifyProducto($id, $nombre, $marca, $precio, $id_rubro, $imagen = NULL)
    {

        if (empty($imagen)) {
            $sentencia = $this->db->prepare("UPDATE productos SET  nombre=? , marca=? , precio=? , id_rubro=?  WHERE id_producto=?"); // prepara la consulta
            $sentencia->execute([$nombre, $marca, $precio, $id_rubro, $id]); // ejecuta
        } else {
            // 2. enviamos la consulta (3 pasos)
            $sentencia = $this->db->prepare("UPDATE productos SET  nombre=? , marca=? , precio=? , id_rubro=? , imagen=? WHERE id_producto=?"); // prepara la consulta
            $sentencia->execute([$nombre, $marca, $precio, $id_rubro, $imagen, $id]); // ejecuta
        }
    }
}
