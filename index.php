<!DOCTYPE html>
<html lang="en">

<?php
    $arquivo = fopen("./livros.txt", "a+t");
    if ($_POST != NULL && $_POST["nome"] != "" && $_POST["autor"] != "" && $_POST["editora"] != "" && $_POST["resumo"] != "" && $_POST["quantidade"] != ""){
        $dados = $_POST["nome"].'|'.$_POST["autor"].'|'.$_POST["editora"].'|'.$_POST["resumo"].'|'.$_POST["quantidade"].'|'.date("H:i d/m/Y")."\n";
        fwrite($arquivo,$dados);
        header('location: index.php');
    }
    fclose($arquivo);

    require 'objetos.inc';

    require 'acervo.inc';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Biblioteca COLTEC - UFMG</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>

        <h2>Listagem de obras do acervo do COLTEC</h2>

        <form action="listagem.php" method="get">
            <input type="text" name="find" placeholder="Nome de obra/autor/autora/editora..." autocomplete="off" id="search-input">
            <input type="submit" name="submit" value="Procurar">
        </form>
        <ul id='main-list'>
            <?php
            foreach ($GLOBALS['acervo']->getObras() as $obra) {
                $obra->echoObra();
            }?>
        </ul>
    </div>
</body>
</html> 