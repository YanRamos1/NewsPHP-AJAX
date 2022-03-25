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
        $db = new Database();
        $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
        $db = $db->connect();
        $db->query($sql);
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
