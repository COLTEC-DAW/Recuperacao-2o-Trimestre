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
    <title>Gerencie seus exercicios</title>
</head>
<body>
<?php 
    require "exercicio.php";

    session_start();

    $exercicio = $_POST['exercicio'];
    $repeticoes = $_POST['repeticoes'];
    $tipo = $_POST['tipo'];
    $equipamento = $_POST['equipamento'];
    $parte_afetada = $_POST['parte_afetada'];
    

    $teste = new Exercicio($exercicio, $repeticoes, $tipo, $equipamento, $parte_afetada);
    
    function guardaExercicio($nome_arquivo, Exercicio $exercicio)
    {
        $lista_usuarios = json_decode(file_get_contents($nome_arquivo));
        for ($i = 0; $i < count($lista_usuarios); $i++)
        {
            if ($lista_usuarios[$i]->nome_usuario == $_SESSION['user'])
            {
                array($lista_usuarios[$i]->listaExercicios);
                array_push($lista_usuarios[$i]->listaExercicios, $exercicio);
                break;
            }
            
        }
        file_put_contents($nome_arquivo, json_encode($lista_usuarios, JSON_PRETTY_PRINT));
    }

    guardaExercicio("json/usuarios.json", $teste);
    header("Location: home.php");
    ?>
</body>
</html>