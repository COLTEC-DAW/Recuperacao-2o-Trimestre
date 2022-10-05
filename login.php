<!-- código do forms de login -->


<?php require("login.class.php") ?>
<?php 
    if(isset($_POST['submit'])){
        $user = new LoginUser($_POST['username'], $_POST['password']);
    }
?>
<!-- se um usuario clicar no botao de login vai receber os dados inseridos -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Mesma estrutura do index -->
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <label> Nome: </label>
        <input type="text" name="username">

        <label> Senha: </label>
        <input type="password" name="password">

        <button type="submit" name="submit"> Fazer Login </button>

        <p class="error">
            <?php echo @$user->error ?> 
        </p>
        <p class="success">
            <?php echo @$user->success ?>
        </p>
    </form>
</body>
</html>