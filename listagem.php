<!DOCTYPE html>
<?php
    if(!isset($_COOKIE['pesquisa_mais_recente_1'])){
        setcookie("pesquisa_mais_recente_1", $_GET['find']);
    } else if(!isset($_COOKIE['pesquisa_mais_recente_2'])){
        setcookie("pesquisa_mais_recente_2", $_COOKIE['pesquisa_mais_recente_1']);
        setcookie("pesquisa_mais_recente_1", $_GET['find']);
    }
    else{
        setcookie("pesquisa_mais_recente_3", $_COOKIE['pesquisa_mais_recente_2']);
        setcookie("pesquisa_mais_recente_2", $_COOKIE['pesquisa_mais_recente_1']);
        setcookie("pesquisa_mais_recente_1", $_GET['find']);
    }
?>


<html lang="en">
<?php
    require 'objetos.inc';

    require 'acervo.inc';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Biblioteca COLTEC - UFMG | Listagem</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>
        <h2>Resultados para a pesquisa: "<?php echo $_GET['find'] ?>" </h2><br>
        <?php $tamanhoTotal = count($GLOBALS['acervo']->getObras());
        $tamanhoPesquisado = count($GLOBALS['acervo']->findObras($_GET['find'])->getObras());
        
        echo "$tamanhoPesquisado registros encontrados de $tamanhoTotal registros."; ?>
        <ul id='main-list'>
            <?php
            foreach ($GLOBALS['acervo']->findObras($_GET['find'])->getObras() as $obra) {
                $obra->echoObra();
            }?>
        </ul>
    </div>
</body>
</html>