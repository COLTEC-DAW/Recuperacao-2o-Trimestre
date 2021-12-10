<?php 
    include "livros.php";
    if(!empty($_POST['nomeObra'])){
        $livro = new Livros ( $_POST['nomeObra'], $_POST['nomeAutor'], $_POST['nomeEditora'], $_POST['sinopseLivro'], $_POST['numeroExemplares'], $_POST['dataLancamento'], $_POST['generoObra']);
        $livros[] = $livro;
        print_r($livros);       

    }
?>