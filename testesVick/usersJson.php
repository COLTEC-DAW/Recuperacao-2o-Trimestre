<?php
session_start();

try {
    // Ler o conteúdo do arquivo JSON
    $usuariosJson = file_get_contents('usersJson.json');
    $usuarios = json_decode($usuariosJson, true);

    $usuarioDigitado = $_POST["user"];
    $senhaDigitada = $_POST["senha"];

    // Verificar se o usuário existe e a senha está correta
    if (isset($usuarios[$usuarioDigitado]) && $usuarios[$usuarioDigitado]["senha"] === $senhaDigitada) {
        $_SESSION["usuario_logado"] = $usuarioDigitado;
        header("Location: index.php");
    } else {
        header("Location: login.php?falhou=true");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
