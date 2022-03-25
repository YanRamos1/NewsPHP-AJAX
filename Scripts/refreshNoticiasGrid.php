<?php
require_once '../Models/Noticias.php';


$noticias = new Noticias();
if (isset($_GET['search'])) {
    sleep(1);
    $search = $_GET['search'];
    $n = $noticias->search($search, $search);
    foreach ($n as $p) {
        echo "<div class='card'>";
        echo "<h2>" . $p['titulo'] . "</h2>";
        echo "<p> Categoria: " . $p['nome'] . "</p>";
        echo "<p>" . $p['conteudo'] . "</p>";
        echo "<p>" . $p['created_at'] . "</p>";
        echo "</div>";
    }


} else {
    $noticias = noticias::getAll();
    foreach ($noticias as $noticia) {
        echo "<div class='card'>";
        echo "<h2>" . $noticia['titulo'] . "</h2>";
        echo "<p> Categoria: " . $noticia['nome'] . "</p>";
        echo "<p>" . $noticia['conteudo'] . "</p>";
        echo "<p>" . $noticia['created_at'] . "</p>";
        echo "</div>";
    }
}

?>

