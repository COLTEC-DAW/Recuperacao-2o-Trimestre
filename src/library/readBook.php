<?php

    include './src/model/book.php';

    function ReadAllBooks(){

        $FileJson = file_get_contents('./src/repository/Livros.json', true);

        setcookie('books', $FileJson);
    }
?>