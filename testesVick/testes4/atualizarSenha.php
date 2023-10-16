<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os dados do formulário foram enviados corretamente
    if (isset($_POST['email'], $_POST['token'], $_POST['novaSenha'])) {
        $email = $_POST['email'];
        $token = $_POST['token'];
        $novaSenha = $_POST['novaSenha'];

        // Lógica para verificar o token no banco de dados ou no arquivo temporário
        // Neste exemplo, verificaremos o token no arquivo users.json
        $usersData = file_get_contents('users.json');
        $users = json_decode($usersData, true);

        if (isset($users[$email]) && isset($users[$email]['reset_token']) && $users[$email]['reset_token'] === $token) {
            // Atualizar a senha do usuário
            $users[$email]['senha'] = password_hash($novaSenha, PASSWORD_DEFAULT);

            // Remover o token de redefinição de senha
            unset($users[$email]['reset_token']);

            // Salvar os dados atualizados no arquivo users.json
            file_put_contents('users.json', json_encode($users));

            echo "Senha atualizada com sucesso.";
        } else {
            echo "Token inválido ou expirado.";
        }
    } else {
        echo "Dados do formulário incompletos.";
    }
}
?>
