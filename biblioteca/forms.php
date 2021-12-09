<?php
session_start();
if (!isset($_SESSION['name']) == true) {
    header('location:index.php');
}
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
    <?php include './style.css';
    include './cadastro.css'
    ?>
    </style>
</head>

<body>
    <div class="Page">
        <?php
        include "inc/header.inc";
        ?>
        <div style="margin-top: 5vh; margin-bottom: 5vh;">
            <div class="container">
                <form action="/postForm.php" method="post">
                    <div class="row">
                        <h4>Cadastre o novo livro da biblioteca</h4>
                        <div class="input-group "><input class="inputCreate" placeholder="Nome do Livro" required
                                name="nome" id="nome" type="text" />
                        </div>
                        <div class="input-group "><textarea class="inputCreate" placeholder="Resumo da Obra" required
                                name="resumo" id="resumo" type="text"></textarea>
                        </div>
                        <div class="input-group "><input class="inputCreate" placeholder="Autor(a):" required
                                name="autor" id="autor" type="text" />
                        </div>
                        <div class="input-group ">
                            <input class="inputCreate" required placeholder="Editora" name="editora" id="editora"
                                type="text" />
                        </div>
                        <div class="input-group "><input class="inputCreate" placeholder="Número de Exemplares" required
                                name="numExemplares" id="numExemplares" type="number" /></textarea>
                        </div>
                        <div class="field">
                            <input class="button btn btn-warning fw-bold" type="submit" value="Cadastrar"
                                id="cadastrar" />
                        </div>
                </form>
            </div>
        </div>

        <?php include "inc/rodape.inc";
        ?>
    </div>

    </div>
</body>

</html>
</body>

</html>



<!-- <form>
                    <div>
                        <div class="field">
                            <label for="nome">Nome:</label><br />
                            <input class="inputCreate" required name="nome" id="nome" type="text" />
                        </div>

                        <div class="field">
                            <label for="resumo">Resumo da obra:</label><br />
                            <textarea class="inputCreate" required name="resumo" id="resumo" type="text"></textarea>
                        </div> -->
<!-- 
        <div class="field">
            <label for="autor">Autor:</label><br />
            <input class="inputCreate" required name="autor" id="autor" type="text" />
        </div>


        <div class="field">
            <label for="editora">Editora:</label><br />
            <input class="inputCreate" required name="editora" id="editora" type="text" />
        </div>


        <div class="field">
            <label for="numExemplares">Numero de Exemplares:</label><br />
            <input class="inputCreate" required name="numExemplares" id="numExemplares" type="number" />
        </div>

    </div> -->