<?php
session_start();
unset($_SESSION['Nome']);
unset($_SESSION['Senha']);
$arquivo = fopen("Livros.txt", 'w');
fclose($arquivo);
session_destroy();
header("Location: Cadastro.php");
?>