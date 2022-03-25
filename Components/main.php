<?php
require_once 'Models/Categorias.php';
?>
<section class="conteudo">
    <h1 class="titulo-conteudo">Sistema de notícias</h1>
    <div class="ActionsButtons">
        <button class="btn" id="BtnCriarNoticia" name="BtnCriarNoticia">Criar Notícia</button>
        <button class="btn" id="BtnCriarCategoria" name="BtnCriarCategoria">Criar Categoria</button>
    </div>
    <div id="GridNoticias">

    </div>
    <div id="mensagens">
        <div id="loader">

        </div>
    </div>
</section>

<div hidden id="ModalCriarNoticia" style="background-color: aqua">
    <div class="modal-content">
        <h2>Criar notícia</h2>
        <form id="FormCriarNoticia" action="">
            <label for="">Titulo</label>
            <input class="form-input-text" type="text" id="TituloNoticia">
            <label for="">Categoria</label>
            <label for="SelectCategorias">
                Categoria
            </label>
            <select style="margin: 1%" name="SelectCategorias" id="SelectCategorias">
                <?php
                $categorias = new Categorias();
                $categorias = $categorias->getAll();
                foreach ($categorias as $categoria) {
                    echo "<option value='{$categoria['id']}'>{$categoria['nome']}</option>";
                }
                ?>
            </select>
            <label for="">Texto</label>
            <textarea class="form-input-text" id="ConteudoNoticia" cols="30" rows="10"></textarea>
            <div id="BtnFormCriarNoticia">
                <input class="btn" type="submit" value="Criar">
                <button class="BtnCancelar btn" name="BtnCancelar">Cancelar</button>
            </div>
        </form>
    </div>
</div>
<div hidden id="ModalCriarCategoria" style="background-color: aqua">
    <div class="modal-content">
        <h2>Criar categoria</h2>
        <form id="FormCriarCategoria">

            <label for="InputCriarCategoria">Nome</label>
            <input id="InputCriarCategoria" type="text" name="nome">
            <div id="BtnFormCriarCategoria">
                <input class="btn" type="submit" value="Criar">
                <button class="BtnCancelar btn" name="BtnCancelar">Cancelar</button>
            </div>
        </form>
    </div>
</div>
