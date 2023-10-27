<?php
if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
}
session_start();
    require "./inc/logger.inc.php";

if (!isset($_SESSION["usuario_logado"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Verificar se as senhas correspondem e estão preenchidas
    if ($_POST["nova_senha"] === $_POST["confirma_nova_senha"] && !empty($_POST["nova_senha"])) {

        // Carregar os dados do usuário
        $usuariosJson = file_get_contents('./json/usersJson.json');
        $usuarios = json_decode($usuariosJson, true);

        $mod_file = [];
        foreach ($usuarios as $j) 
        {
            if (strcmp($j['userName'],$_SESSION["user"]["userName"]) == 0) 
            {
                $aux = array(
                    "email" => $j["email"],
                    "userName" => $j["userName"],
                    "password" => $_POST["nova_senha"],
                );
                $mod_file[] = $aux;
            }
            else
            {
                $aux = array(
                    "email" => $j["email"],
                    "userName" => $j["userName"],
                    "password" => $j["password"],
                );
                $mod_file[] = $aux;
            }
        }

        // Limpa arquivo para reescrever
        $fp = fopen('./json/usersJson.json', "r+");
        ftruncate($fp, 0);
        fclose($fp);

        // Salvar os dados atualizados no arquivo JSON
        file_put_contents('./json/usersJson.json', json_encode($mod_file, JSON_PRETTY_PRINT));

        $registro = 'Senha alterada: '.$_SESSION["user"]["userName"];
        atualizaLog($registro);
        
        

        echo "Senha redefinida com sucesso!";
    } else {
        echo "As senhas não correspondem ou estão vazias.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./css/workspace.css">
    <title>Alterar senha</title>
</head>

<body>
    <h2>Redefinir Senha</h2>
    <form method="post" action="">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required><br><br>
        <label for="confirma_nova_senha">Confirme a Nova Senha:</label>
        <input type="password" id="confirma_nova_senha" name="confirma_nova_senha" required><br><br>
        <input type="submit" value="Redefinir Senha">
        <button><a href="./index.php">Voltar</a></button>
        
    </form>
</body>

</html>
