<?php


    function ReadAllBooks(){

        $FileJson = file_get_contents('./src/repository/Livros.json', true);

        $_SESSION["books"] = $FileJson;

        return json_encode($FileJson);
    }
?>