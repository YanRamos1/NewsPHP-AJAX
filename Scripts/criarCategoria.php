<?php
require_once '../Config/Database.php';


try {
    $nome = $_POST['categoria'];
    $db = new Database();
    $db = $db->connect();
    $sql = "INSERT INTO categorias (nome) VALUES (:nome)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    sleep(2);
    $stmt->execute();

    echo "Categoria cadastrada com sucesso!";
} catch (Exception $e) {
    echo $e->getMessage();
}




