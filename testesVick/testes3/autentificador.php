<?php
session_start();

try {
    // Ler o conteúdo do arquivo JSON
    $usuariosJson = file_get_contents('usersJson.json');
    $usuarios = json_decode($usuariosJson, true);

    $emailDigitado = $_POST["email"];
    $senhaDigitada = $_POST["senha"];

    // Verificar se o email existe e a senha está correta
    foreach ($usuarios as $usuario => $info) {
        if ($info["email"] === $emailDigitado && $info["senha"] === $senhaDigitada) {
            $_SESSION["usuario_logado"] = $usuario;
            header("Location: index.php");
            exit();
        }
         else {
        header("Location: login.php?falhou=true");
        }
    }
    
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
