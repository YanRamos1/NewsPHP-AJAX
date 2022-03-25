<?php
require_once '../Models/Categorias.php';


try {
    $categorias = new Categorias();
    $nome = $_POST['categoria'];
    $categorias->add($nome);
    sleep(2);
    echo "Categoria cadastrada com sucesso!";
} catch (Exception $e) {
    echo $e->getMessage();
}




