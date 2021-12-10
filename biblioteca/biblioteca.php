<?php
session_start();
if (!isset($_SESSION['name']) == true) {
    header('location:index.php');
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Biblioteca do Coltec</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
    <?php include './style.css';
    ?>
    </style>
</head>
<?php
include './Livro.php';
?>


<body>

    <div>
        <div class="Page">

            <?php
            include "inc/header.inc";
            $livros = lastBooks();
            $livros = lastBooks();
            imprimirLivros($livros);
            include "inc/rodape.inc";
            ?>
        </div>
    </div>
</body>