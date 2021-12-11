<?php
if(!isset($_POST['MenuApresentacao'])){
    header('Location: MenuApresentação.html');
}
 if(isset($_COOKIE['User'])){
  header('Location: Login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <form action="LoginRecebimentoDeDados.php" id='go' method="post">
        <p>Digite seu nome para Cadastro:</p>
        <input type="text" name="Nome">
        <p>Digite a sua senha para Cadastro:</p>
        <input type="password" name="Senha">
        <input type="submit" name="botao">
    </form>
</body>
</html>