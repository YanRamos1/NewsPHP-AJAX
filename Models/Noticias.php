<?php
require_once '../Config/Database.php';
class Noticias
{


    public $id;
    public $titulo;
    public $conteudo;
    public $noticia_id;


    public function __construct(){
        $this->id = 0;
        $this->titulo = "";
        $this->conteudo = "";
        $this->noticia_id = 0;
        $this->updated_at ='';
    }

    public function add($titulo, $conteudo, $categoria_id){
        $db = new Database();
        $db = $db->connect();
        $sql = "INSERT INTO noticias (titulo, conteudo, noticia_categoria) VALUES ('$titulo', '$conteudo', '$categoria_id')";
        $db->query($sql);

    }

    public function delete($id){
        $sql = "DELETE FROM noticias WHERE id = :id";
        $db  = new Database();
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function getAll(){
        $sql = "SELECT * FROM noticias n INNER JOIN categorias c on n.noticia_categoria = c.id";
        $db  = new Database();
        $stmt = $db->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($titulo, $categoria_nome){
        $sql = "SELECT n.id,n.titulo, n.conteudo, n.created_at, c.nome FROM noticias n INNER JOIN categorias c ON n.noticia_categoria = c.id WHERE n.titulo LIKE CONCAT('%',:titulo,'%') OR c.nome LIKE CONCAT('%',:categoria_nome,'%')";
        $db  = new Database();
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':categoria_nome', $categoria_nome);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
