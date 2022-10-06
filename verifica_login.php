<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        session_start();

        $usuario = $_POST['user'];
        $senha = $_POST['password'];

        $arquivo = json_decode(file_get_contents("json/usuarios.json"));

        foreach ($arquivo as $usuarios)
        {
            if($usuarios->nome_usuario == $usuario)
            {
                if ( $usuarios->senha == $senha) 
                {
                    $_SESSION["user"] = $_POST["user"];
                    header("Location: home.php");
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" media="screen">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <title>Verificando o login</title>
    </head>
    <body class="container"> 
        <h1>Não foi possível efetuar o login</h1>
        <h2> Favor verificar  a senha e/ou nome de usuário</h2>
        <a href="index.php">Voltar</a>
    </body>
</html>