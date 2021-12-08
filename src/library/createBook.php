<?php
    
    include './src/model/book.php';

    function CreateBook(){

        if(isset($_POST["NomeObra"]) && isset($_POST["NomeAutor"]) && isset($_POST["NomeEditora"])
            && isset($_POST["ResumoObra"]) && isset($_POST["NumExemplares"]))
        {
            $novoLivro = new book($_POST["NomeObra"], $_POST["NomeAutor"], $_POST["NomeEditora"], $_POST["ResumoObra"], $_POST["NumExemplares"]);

            $novoLivro->PostLivro();

            return true;
        }
        else
        {
            return false;
        }
    }
?>