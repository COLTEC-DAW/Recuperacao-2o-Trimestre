<?php
include './Livro.php';
if (isset($_POST)) {
    addLivro(new Livro($_POST["nome"], $_POST["resumo"], $_POST["autor"], $_POST["editora"], $_POST["numExemplares"], date("d/m/Y")));
}
header("Location: Biblioteca.php");