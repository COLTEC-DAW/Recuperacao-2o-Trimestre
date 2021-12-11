<?php 
    include "livros.php";
    if(isset($_POST['submit'])){
        $novoLivro = new Livros ( $_POST['nomeObra'], $_POST['nomeAutor'], $_POST['nomeEditora'], $_POST['sinopseLivro'], $_POST['numeroExemplares'], $_POST['dataLancamento'], $_POST['generoObra']);
        $novoLivro->salvaLivro();
    }
?>