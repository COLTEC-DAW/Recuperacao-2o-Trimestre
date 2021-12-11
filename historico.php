<!DOCTYPE html>
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
    <title>Biblioteca COLTEC - UFMG | Histórico</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>

        <?php
            if(isset($_COOKIE['pesquisa_mais_recente_1'])){
                echo "<h2>Pesquisas mais recentes</h2>";
            }
        ?>
        <ul id='main-list'>
            <?php
                if(isset($_COOKIE['pesquisa_mais_recente_1'])){
                    $input1 = $_COOKIE['pesquisa_mais_recente_1'];
                    echo "<p>Resultados para: $input1 </p>";
                    foreach ($GLOBALS['acervo']->findObras($_COOKIE['pesquisa_mais_recente_1'])->getObras() as $obra) {
                        $obra->echoObra();
                    }

                    if(isset($_COOKIE['pesquisa_mais_recente_2'])){
                        $input2 = $_COOKIE['pesquisa_mais_recente_2'];
                        echo "<p>Resultados para: $input2 </p>";
                        foreach ($GLOBALS['acervo']->findObras($_COOKIE['pesquisa_mais_recente_2'])->getObras() as $obra) {
                            $obra->echoObra();
                        }

                        if(isset($_COOKIE['pesquisa_mais_recente_3'])){
                            $input3 = $_COOKIE['pesquisa_mais_recente_3'];
                            echo "<p>Resultados para: $input3 </p>";
                            foreach ($GLOBALS['acervo']->findObras($_COOKIE['pesquisa_mais_recente_3'])->getObras() as $obra) {
                                $obra->echoObra();
                            }
                        }
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>