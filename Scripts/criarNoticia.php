<?php
require_once '../Models/Noticias.php';



try {
    $noticia = new Noticias();
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $categoria = $_POST['categoria'];
    sleep(2);
    $noticia->add($titulo, $conteudo, $categoria);
    echo "Noticia criada com sucesso!";
} catch (Exception $e) {
    echo "Erro ao criar noticia: " . $e->getMessage();
}
