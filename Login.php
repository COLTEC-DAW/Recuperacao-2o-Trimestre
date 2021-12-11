<?php

session_start();

 if(isset($_COOKIE['Nome']) && isset($_COOKIE['Senha'])){ //Se já tem uma conta cadastrada
  if($_COOKIE['Nome'] == $_POST['Nome'] && $_COOKIE['Senha'] == $_POST['Senha']){ //Se os dados do Login são iguais os da conta
    $_SESSION['Nome'] = $_COOKIE['Nome'];
    $_SESSION['Senha'] = $_COOKIE['Senha'];
    header("Location: Menu.php");
  }else{
    session_destroy();
    header("Location: LoginRecebimentoDeDados.php");
  }
}else{
      session_destroy();
      header("Location: Cadastro.php");
  }

?>