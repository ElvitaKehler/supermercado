<?php



class ItemModel{

    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_supermercado';
        $pdo=new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        return $pdo;

     }

    public function getItems() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM rubros"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $rubros = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $rubros;
    }
    public function InsertOneItem($nombre){
       
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO rubros(nombre) VALUES(?)"); // prepara la consulta
        return $sentencia->execute([$nombre]); // ejecuta
    }

    public function borrarITem($idrubro){
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM rubros  WHERE id_rubro = ?"); // prepara la consulta
        $sentencia->execute([$idrubro]); // ejecuta 
        return $sentencia;
        
  }
}

