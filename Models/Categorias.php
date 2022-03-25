<?php
require_once 'Config/Database.php';

class Categorias
{

    public $id;
    public $nome;

    public function __construct()
    {
        $this->id = '';
        $this->nome = '';
    }

    public function add($nome)
    {
        $sql = 'INSERT INTO categorias (nome) VALUES (:nome)';
        $db = new Database();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }

    public static function getAll()
    {
        $sql = "SELECT * FROM categorias";
        $db = new Database();
        $db = $db->connect();
        $result = $db->query($sql);
        return $result;
    }


}
