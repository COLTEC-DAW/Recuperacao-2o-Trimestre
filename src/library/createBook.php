<?php
    
    include '../model/book.php';

    if(isset($_POST["NomeObra"]) && isset($_POST["NomeAutor"]) && isset($_POST["NomeEditora"])
        && isset($_POST["ResumoObra"]) && isset($_POST["NumExemplares"]))
    {
        $novoLivro = new book($_POST["NomeObra"], $_POST["NomeAutor"], $_POST["NomeEditora"], $_POST["ResumoObra"], $_POST["NumExemplares"]);

        $novoLivro->PostLivro();
    }

    
?>