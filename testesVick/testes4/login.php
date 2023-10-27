<?php
session_start();

$_SESSION["usuario_logado"] = NULL;

function checkUser($email, $senha, $usersExisting)
{
    foreach ($usersExisting as $user) {
        if ($user['email'] === $email && $user['password'] === $senha) {
            return $user;
        }
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usersExisting = [];

    if (file_exists("usersJson.json")) {
        $usersExisting = json_decode(file_get_contents("usersJson.json"), true);
    }

    if (isset($_POST["login"])) {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";

        $user = checkUser($email, $senha, $usersExisting);
        $_SESSION["usuario_logado"] = $email;
        if ($user) {
            echo $_SESSION["user"];
            $_SESSION["user"] = $user;
            $_SESSION["existing"] = $usersExisting;
            $_SESSION["usuario_logado"] = $usuarioDigitado;
            $_SESSION["usuario_logado"] = $email;
            header("Location: index.php");
            //exit();
        } else {
            echo "Senha ou email incorretos";
        }
    }
}

if (isset($_POST["cadastro"])) {
    header("Location: cadastro.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela-login</title>
</head>

<body>

    <div class="bloco-login">
        <img src="logo.png" />

        <div class="ItensLogin">

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required><br><br>

                <input class="iniciar" type="submit" name="login" value="Login"><br><br>
            </form>
            <a href="cadastro.php" class="btn">Ainda não sou cadastrado</a><br><br>
            <a href="redefinirSenha.php" class="btn">Esqueci a senha</a>
        </div>
        </form>
</body>
</html>