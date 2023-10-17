<?php
session_start();

if (!isset($_SESSION["usuario_logado"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar se as senhas correspondem e estão preenchidas
    $novaSenha = $_POST["nova_senha"];
    $confirmaNovaSenha = $_POST["confirma_nova_senha"];

    if ($novaSenha === $confirmaNovaSenha && !empty($novaSenha)) {
        // Carregar os dados do usuário
        $usuariosJson = file_get_contents('usersJson.json');
        $usuarios = json_decode($usuariosJson, true);

        // Encontrar o usuário pelo email
        $usuarioLogado = $_SESSION["usuario_logado"];
        $indiceUsuario = array_search($usuarioLogado, array_column($usuarios, 'userName'));

        // Atualizar a senha com a nova senha fornecida pelo usuário
        $usuarios[$indiceUsuario]["password"] = $novaSenha;

        // Salvar os dados atualizados no arquivo JSON
        file_put_contents('usersJson.json', json_encode($usuarios, JSON_PRETTY_PRINT));

        echo "Senha redefinida com sucesso!";
    } else {
        echo "As senhas não correspondem ou estão vazias.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>

<body>
    <h2>Redefinir Senha</h2>
    <form method="post" action="">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required><br><br>
        <label for="confirma_nova_senha">Confirme a Nova Senha:</label>
        <input type="password" id="confirma_nova_senha" name="confirma_nova_senha" required><br><br>
        <input type="submit" value="Redefinir Senha">
        <a href="login.php">Voltar para página de login</a>
    </form>
</body>

</html>
