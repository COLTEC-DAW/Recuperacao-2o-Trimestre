<!-- forms de registro -->


<!-- codigo em php pra manipular o data do form -->
<!-- acessa a classe registerUser para escrever nela -->
<?php require("registro.class.php") ?>

<!-- checa se o butao de submit foi clicado -->
<?php 
    // se o botao foi clicado passa pelo construtor a senha e o nome
    // isset: checa se a variavel esta definida
    // $_POST: acessa dados da pag/coleta os dados enviados
    /* o $_POST tb age como array - em php um array em vez de ser definido por numero (0, 1, 2, 3) pode ser difinido por strings
    [
        'submit' => true,
        'username' => luiza,
        'password' => '123'
    ]
    */
    if(isset($_POST['submit'])){
        $user = new RegistrarUsuario($_POST['username'], $_POST['password']);
    }
    if(isset($_POST['lo'])){
        header("location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    
    <!-- 
        action: para onde os dados do form serao enviados. como n tem nada fica na mesma pagina
        method: metodo http usado. post significa enviar dados
        enctype: formato que junta os dados 
        autocomplete: 
     -->
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <label> Nome: </label>
        <input type="text" name="username">

        <label> Senha: </label>
        <input type="password" name="password">

        <!-- cria um botao do tipo submit, ou seja, que submits form-data -->
        <button type="submit" name="submit"> Registrar usuário </button>
        <button type="submit" name="lo"> login </button>
        <!-- mostra erros de validaçao-->
        <p class="error">
            <?php echo @$user->error ?> <!-- @: acessar a variavel -->
        </p>
        <!-- mostra que deu certo -->
        <p class="success">
            <?php echo @$user->success ?>
        </p>

    </form>

</body>
</html>