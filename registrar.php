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
    <title>Biblioteca COLTEC - UFMG | Registro</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>

        <h2>Registrar nova obra</h2>

        <form action="index.php" method="post" id="form-registrar">
            Nome: <input type="text" name="nome" placeholder="Nome da obra" autocomplete="off">
            Qtd.: <input type="number" name="quantidade" autocomplete="off"><br>

            Autor(a): <input type="text" name="autor" placeholder="Nome do autor/Nome da autora" autocomplete="off">
            Editora: <input type="text" name="editora" placeholder="Nome da editora" autocomplete="off"> <br>

            Descrição: <textarea name="resumo" placeholder="Resumo/Sinopse/Descrição" autocomplete="off" id="desc-input"></textarea><br>
            
            <input type="submit" name="registrar" value="Registrar nova obra">
        </form>
    </div>
</body>
</html>