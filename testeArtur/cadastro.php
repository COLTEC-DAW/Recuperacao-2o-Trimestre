<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicialize $usersExisting como um array vazio se não houver dados no arquivo
    $usersExisting = [];

    if (file_exists("usersJson.json")) {
        $usersExisting = json_decode(file_get_contents("usersJson.json"), true);
        // Verifique se a decodificação foi bem-sucedida
      
    }

    if (isset($_POST["signUp"])) {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $userName = isset($_POST["userName"]) ? $_POST["userName"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

       
        foreach ($usersExisting as $user) {
            if ($user["email"] === $email) {
                echo "Este email já está cadastrado. Tente logar!";
                exit;
            }
        }

        $data = date("d/m/Y H:i");
        $user = array(
            "email" => $email,
            "userName" => $userName,
            "password" => $password,
        );

        setcookie("lastSession", $data);
        $usersExisting[] = $user;

        file_put_contents("usersJson.json", json_encode($usersExisting, JSON_PRETTY_PRINT));
        $_SESSION["user"] = $user;
        $_SESSION["existing"] = $usersExisting;

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela-cadastro</title>
</head>

<body>
    <div class="bloco-login">
        <img src="logo.png">
        <div class="ItensLogin">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>
                <label for="userName">Nome:</label>
                <input type="text" name="userName" required><br><br>
                <label for="password">Senha:</label>
                <input type="password" name="password" required><br><br>
                <input class="iniciar" type="submit" name="signUp" value="Enviar" />
            </form>
            <a href="login.php" class="btn">Voltar à tela de login</a>
        </div>
    </div>
</body>
</html>