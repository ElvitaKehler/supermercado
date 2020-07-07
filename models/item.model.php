<?php

require_once('model.php');


class ItemModel extends Model
{



    public function getItems()
    {

        $sentencia = $this->db->prepare("SELECT * FROM rubros ORDER BY rubros.nombre ASC "); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $rubros = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubros;
    }
    public function InsertOneItem($nombre, $imagen)
    {

        $sentencia = $this->db->prepare("INSERT INTO rubros(nombre,imagen_rubro) VALUES(?,?)"); // prepara la consulta
        return $sentencia->execute([$nombre, $imagen]); // ejecuta
    }

    public function borrarITem($idrubro)
    {

        $sentencia = $this->db->prepare("DELETE FROM rubros  WHERE id_rubro = ?"); // prepara la consulta
        $sentencia->execute([$idrubro]); // ejecuta 
        return $sentencia;
    }

    public function getItem($idrubro)
    {

        $sentencia = $this->db->prepare("SELECT * FROM rubros WHERE id_rubro=?"); // prepara la consulta
        $sentencia->execute([$idrubro]); // ejecuta
        $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubro;
    }

    public function getItemNombre($nombre)
    {

        $sentencia = $this->db->prepare("SELECT * FROM rubros WHERE nombre=?"); // prepara la consulta
        $sentencia->execute([$nombre]); // ejecuta
        $rubro = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubro;
    }

    public function modifyItem($idrubro, $nombre, $imagen = NULL)
    {

        if (empty($imagen)) {
            $sentencia = $this->db->prepare("UPDATE rubros SET nombre=?  WHERE id_rubro=?"); // prepara la consulta
            $sentencia->execute([$nombre, $idrubro]); // ejecuta
        } else {
            $sentencia = $this->db->prepare("UPDATE rubros SET nombre=? , imagen_rubro=? WHERE id_rubro=?"); // prepara la consulta
            $sentencia->execute([$nombre, $imagen, $idrubro]); // ejecuta
        }
    }
}
