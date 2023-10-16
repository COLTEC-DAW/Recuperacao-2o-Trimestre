<?php
session_start();
// Lógica para processar os dados do usuário e enviar o e-mail com o link para a página de atualização de senha

// Verifica se o e-mail foi fornecido pelo usuário
if (isset($_POST['email'])) {
    // Verifica se o e-mail existe no arquivo users.json
    $usersData = file_get_contents('usersJson.json');
    $users = json_decode($usersData, true);

    $email = $_POST['email'];
    if (isset($users[$email])) {
        // Gerar um token aleatório para o link de redefinição de senha
        $token = bin2hex(random_bytes(16));

        // Armazenar o token para o e-mail do usuário no banco de dados ou em um arquivo temporário
        // Neste exemplo, armazenaremos o token no array de usuários
        $users[$email]['reset_token'] = $token;

        // Salvar os dados atualizados no arquivo users.json
        file_put_contents('usersJson.json', json_encode($users));

        // Enviar e-mail com o link de redefinição de senha
        $resetLink = "http://localhost:8000/atualizarSenha.php?email=$email&token=$token";
        // Lógica para enviar o e-mail com o link de redefinição de senha
        // Aqui você pode usar a função mail() ou um serviço de envio de e-mails

        echo "Um e-mail com o link para redefinição de senha foi enviado para o seu endereço de e-mail.";
    } else {
        echo "E-mail não encontrado.";
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
    <div class="bloco-login">
        <img src="logo.png">
        <div class="ItensLogin">
            <form action="redefinirSenha.php" method="post">
                <label for="email">E-mail:</label>
                <input id="email" name="email" class="form-control" type="text" required/>
                <button type="submit" class="btn btn-success">Enviar nova senha</button><br><br>
            </form>
        </div>
        <p>Para redefinir a senha acesse o link enviado no e-mail <br>
        cadastrado, se o e-mail não estiver na caixa principal <br>
        verifique seu spam.<br><br>
        <a href="login.php" class="btn">Voltar à tela de login</a>
        </p>
    </div>
</body>
</html>
