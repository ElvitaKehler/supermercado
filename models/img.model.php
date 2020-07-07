<?php
require_once('model.php');
class ImagenModel extends Model
{


    public function agregar($id, $image = null)
    {
        if ($image) {
            $sentencia = $this->db->prepare("INSERT INTO  imagenes_rubro(path,id_rubro_fk) VALUES(?,?)");
            $sentencia->execute([$image, $id]);
        }
    }
    public function deleteImage($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM imagenes_rubro WHERE id_imagen=?");
        $sentencia->execute([$id]);
    }

    public function GetImages($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM imagenes_rubro WHERE id_rubro_fk=?");
        $sentencia->execute([$id]);
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $imagenes;
    }
    public function obtenerRutaImagen($id)
    {
        $sql = "SELECT imagenes_rubro.path FROM imagenes_rubro WHERE id_imagen=?";

        $sentencia = $this->db->prepare($sql); // prepara la consulta
        $sentencia->execute([$id]); // ejecuta -
        $rutaimagen = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rutaimagen;
    }
}
