<?php

require "user.php";

$user = new User($_POST['name'], $_POST['email'], $_POST['nome_usuario'], $_POST['password']);

function VerificarUsuario($data)
{
    $fileUsers = json_decode(file_get_contents("json/usuarios.json"));

    foreach($fileUsers as $usuarios)
    {
        if($usuarios->nome_usuario == $data->nome_usuario || $usuarios->email == $data->email) return TRUE;
    }
    return FALSE;
}

function ArmazenaUsuario($data)
{
    
    $fileUsers = json_decode(file_get_contents("json/usuarios.json"));
    array($fileUsers);

    if (VerificarUsuario($data))
    {
        //!isso significa que deu errado 
        return TRUE;
    }else
    {
        array_push($fileUsers, $data);
        file_put_contents("json/usuarios.json", json_encode($fileUsers, JSON_PRETTY_PRINT));
    }
}

$ERRO = ArmazenaUsuario($user);

if($ERRO)
{
    ?> 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" media="screen">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <title>Usuário ou Email Já Utilizados</title>
    </head>
    <body class="container">
        <h1>Usuário ou E-mail já utilizados</h1>
        <h2>Tente se cadastrar novamente</h2>
        <a href="cadastro_usuario.php">Voltar</a>
    </body>
    </html>
    
    <?php
}
else
{
    header("Location: index.php");
}

?>
