<?php
session_start();
if(!isset($_SESSION["usuario_logado"])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina-Princial</title>
</head>
<body>
    <h1>Altere sua senha</h1>
    <a href="alterarSenha.php">Alterar Senha</a>
    <form method="post" action="login.php">
        <button type="submit">Sair</button>
    </form>
</body>
</html>