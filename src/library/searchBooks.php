<?php

    function SearchBooks(){

        if(isset($_GET["procurado"])){
            $FileJson = file_get_contents('./src/repository/Livros.json', true);
            $decode = json_decode($FileJson, true);
            $retorno = [];

            foreach($decode as $livro){
                if($livro["NomeObra"] == $_GET["procurado"] || $livro["NomeAutor"] == $_GET["procurado"] || $livro["NomeEditora"] == $_GET["procurado"]){
                    array_push($retorno, $livro);
                }
            }

            setcookie('booksResult', $retorno);

            return true;
        }
        else{
            return false;
        }
    }
?>