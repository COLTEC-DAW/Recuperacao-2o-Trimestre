<?php

function showSessionState(){
    if (isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"];
    }

    if (isset($_POST['sair'])){
        session_unset();
        session_destroy();
    }

    if (isset( $_SESSION["username"])){
        echo 'Bem vindo, ' . $_SESSION["username"];
        
        
        echo '<form method="POST" action="index.php">
        <input type="submit" name="sair" value="Encerrar Sessão">
        </form>';
        
    }
    else {
        echo '
        <form method="POST" action="index.php">
        <input type="text" class="form-control-dark" placeholder="Digite o nome de usuário" name="username" required>
        <input type="submit" class="btn btn-outline-light me-2" value="Entrar">
        </form>
        ';
    }
}

?>