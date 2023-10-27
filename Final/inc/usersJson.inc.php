<?php
session_start();

try {
    // Ler o conteúdo do arquivo JSON
    $usuariosJson = file_get_contents('./../json/usersJson.json');

    // Verificar se o JSON é vazio ou inválido
    if ($usuariosJson === false) {
        throw new Exception("Erro ao ler o arquivo JSON.");
    }

    // Decodificar o JSON em um array associativo
    $usuarios = json_decode($usuariosJson, true);

    // Verificar se a decodificação foi bem-sucedida
    if ($usuarios === null) {
        throw new Exception("Erro ao decodificar o JSON.");
    }

    $usuarioDigitado = isset($_POST["user"]) ? $_POST["user"] : "";
    $senhaDigitada = isset($_POST["senha"]) ? $_POST["senha"] : "";

    // Verificar se o usuário existe e a senha está correta
    if (isset($usuarios[$usuarioDigitado]) && $usuarios[$usuarioDigitado]["password"] === $senhaDigitada) {
        $_SESSION["usuario_logado"] = $usuarioDigitado;
        header("Location: ./../index.php");
        exit();
    } else {
        header("Location: ./../login.php?falhou=true");
        exit();
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>