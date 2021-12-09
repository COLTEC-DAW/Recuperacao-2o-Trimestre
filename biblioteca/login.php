<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <title>Biblioteca do Coltec</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
    <?php include './style.css';
    include './login.css';
    ?>
    </style>
</head>

<body>
    <div class="container">
        <section id="content">
            <form action="./index.php" method="post">
                <h1>Seja Bem Vinde a biblioteca, qual o seu nome?</h1>
                <div>
                    <input type="text" placeholder="Nome" required="required" name="usuario" id="username" />
                </div>
                <div>
                    <input type="submit" value="Entrar" />
                </div>
            </form>
            <!-- form -->

        </section><!-- content -->
    </div>
    <!-- container -->
    <!-- <div class="login">
        <h1>Login</h1>
        <form action="index.php" method="post">
            <legend>Seja bem vindo ao sistema da biblioteca, quem é você?</legend>
            <input type="text" name="usuario" placeholder="Nome" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
    </div> -->
    <!-- <div class="formLogin">
        <form action="index.php" method="post">
            <fieldset>
                <legend>Seja bem vindo ao sistema da biblioteca, quem é você?</legend>
                <input type="text" size="50" required name="usuario"><br>
            </fieldset>
            <input type="submit" value="Login">
        </form>
    </div> -->
</body>

</html>