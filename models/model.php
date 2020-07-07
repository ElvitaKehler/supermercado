<?php


class Model
{                   //clase padre

    public $db;

    public function __construct()
    {
        $this->db = $this->createConection();
    }


    public function createConection()
    {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_supermercado';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception  $e) {
            var_dump($e);
        }
        return $pdo;
    }
}
