<?php
session_start();
if (!isset($_SESSION['name']) == true) {
    header('location:index.php');
}
if (!isset($_POST["txtBusca"])) {
    header('location: Biblioteca.php');
}
?>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca do Coltec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
    <?php include './style.css';
    ?>
    </style>
</head>

<body>

    <div>
        <div class="Page">

            <?php
            if (isset($_POST["txtBusca"])) {
                include './Livro.php';
                include "inc/header.inc";

                $query = $_POST["txtBusca"];
                $sel = pesquisaLivro($query);
                imprimirLivros($sel);
                $numPesquisados = count($sel);
                if ($numPesquisados < 1) {
                    echo '<div>Ops nao foram encontrados livros que correspondem a sua pesquisa</div>';
                } else if ($numPesquisados == 1) {
                    echo '<div>Foi encontrado um livro que corresponde a sua pesquisa</div>';
                } else {
                    echo '<div>Foram encontrados ' . $numPesquisados . ' livros que correspondem a sua pesquisa</div>';
                }
                include "inc/rodape.inc";
            }
            ?>
        </div>
    </div>
</body>

</html>