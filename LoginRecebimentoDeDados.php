<?php


    session_start();
    if(isset ($_SESSION['Nome']) ){ // Se já tem uma sessão aberta
        header('Location: Menu.php');
    }else{
        if(isset($_POST['Nome']) && isset($_POST['Senha'])){ // Se veio da página cadastro
            setcookie('Nome',$_POST['Nome'],-1);
            setcookie('Nome',$_POST['Nome'],time()+4000);
            $_SESSION['Nome'] = $_COOKIE['Nome'];
            setcookie('Senha',$_POST['Senha'],time()-1);
            setcookie('Senha',$_POST['Senha'],time()+4000);
            $_SESSION['Senha'] = $_COOKIE['Senha'];
        }else{
            session_destroy();
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="Login.php" method="post">
        <p>Digite seu nome para Login:</p>
        <input type="text" name="Nome">
        <p>Digite a sua senha para Login:</p>
        <input type="password" name="Senha">
        <input type="submit" name="botao">
    </form>
</body>
</html>