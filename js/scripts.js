$(document).ready(function () {
    refreshGrid();
    let BtnCriarNoticia = document.getElementById('BtnCriarNoticia');
    BtnCriarNoticia.onclick = function () {
        let ModalCriarNoticia = document.getElementById('ModalCriarNoticia');
        ModalCriarNoticia.style.display = 'block';
    }
    let BtnCriarCategoria = document.getElementById('BtnCriarCategoria');
    BtnCriarCategoria.onclick = function () {
        let ModalCriarCategoria = document.getElementById('ModalCriarCategoria');
        ModalCriarCategoria.style.display = 'block';
    }


//when the user click on class btnCancelar will close all modals
    let btnCancelar = document.getElementsByClassName('BtnCancelar');
    for (let i = 0; i < btnCancelar.length; i++) {
        btnCancelar[i].onclick = function () {
            let ModalCriarCategoria = document.getElementById('ModalCriarCategoria');
            ModalCriarCategoria.style.display = 'none';
            let ModalCriarNoticia = document.getElementById('ModalCriarNoticia');
            ModalCriarNoticia.style.display = 'none';
        }
    }

    $("#Formsearch").submit(function (e) {
        e.preventDefault();
        if ($("#search").val() == "") {
            refreshGrid();
        } else {
            let InputSearch = document.getElementById('InputSearch').value;
            $.ajax({
                url: "Scripts/refreshNoticiasGrid.php",
                type: "GET",
                data: {
                    search: InputSearch
                },
                success: function (data) {
                    $('#GridNoticias').html(data);
                    let loader = document.getElementById('loader');
                    loader.style.display = 'none';
                },
                beforeSend: function () {
                    let loader = document.getElementById('loader');
                    loader.style.display = 'block';
                },
            })
        }
    });

    $("#FormCriarNoticia").submit(function (e){
        e.preventDefault();
        let Titulo = document.getElementById('TituloNoticia').value;
        let Categoria_id = document.getElementById('SelectCategorias').value;
        let Conteudo = document.getElementById('ConteudoNoticia').value;

        if(Titulo == "" || Categoria_id == "" || Conteudo == ""){
            alert("Preencha todos os campos!");
        }else{
            $.ajax({
                url: "Scripts/criarNoticia.php",
                type: "POST",
                data: {
                    titulo: Titulo,
                    categoria: Categoria_id,
                    conteudo: Conteudo
                },
                success: function (data) {
                    let ModalCriarNotica = document.getElementById('ModalCriarNoticia');
                    ModalCriarNotica.style.display = 'none';
                    let loader = document.getElementById('loader');
                    loader.style.display = 'none';
                    let btns = document.getElementById('BtnFormCriarNoticia');
                    btns.style.display = 'block';
                    alert(data);
                    refreshGrid();
                },
                beforeSend: function () {
                    let loader = document.getElementById('loader');
                    loader.style.display = 'block';
                },
            })
        }
    });

    $("#FormCriarCategoria").submit(function (e) {
        e.preventDefault();
        let InputCriarCategoria = document.getElementById('InputCriarCategoria').value;
        if (InputCriarCategoria === '' || InputCriarCategoria === null) {
            alert("Por favor preencha o campo");
        } else {
            $.ajax({
                url: "Scripts/criarCategoria.php",
                type: "POST",
                data: {
                    categoria: InputCriarCategoria
                },
                success: function (data) {
                    let ModalCriarCategoria = document.getElementById('ModalCriarCategoria');
                    ModalCriarCategoria.style.display = 'none';
                    let loader = document.getElementById('loader');
                    loader.style.display = 'none';
                    let btns = document.getElementById('BtnFormCriarCategoria');
                    btns.style.display = 'block';
                    let FromCriarCategoria = document.getElementById('FormCriarCategoria');
                    alert(data);
                },
                beforeSend: function () {
                    let btns = document.getElementById('BtnFormCriarCategoria');
                    btns.style.display = 'none';
                    let loader = document.getElementById('loader');
                    loader.style.display = 'block';
                },
            })
        }
    });



function refreshGrid() {
    $.ajax({
        url: "Scripts/refreshNoticiasGrid.php",
        type: "GET",
        success: function (data) {
            $('#GridNoticias').html(data);
        }
    })
}


})
