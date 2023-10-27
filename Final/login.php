<?php
session_start();
    require "./inc/logger.inc.php";

function checkUser($email, $password, $usersExisting)
{
    foreach ($usersExisting as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            return $user;
        }
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usersExisting = [];

    if (file_exists("./json/usersJson.json")) {
        $usersExisting = json_decode(file_get_contents("./json/usersJson.json"), true);
    }

    if (isset($_POST["login"])) {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $user = checkUser($email, $password, $usersExisting);

        if ($user) {
            // Definindo cookies
            setcookie("user_email", $email, time() + (86400 * 30), "/");  //Cookie válido por 30 dias
            setcookie("user_id", $user['id'], time() + (86400 * 30), "/");  //Cookie válido por 30 dias

            $_SESSION["user"] = $user;
            $_SESSION["existing"] = $usersExisting;
            $_SESSION["usuario_logado"] = $email;

            // Atualiza log de atividades
            $registro = 'Novo login: '. $_SESSION["user"]["userName"];
            atualizaLog($registro);

            header("Location: ./index.php");

        } else {
            echo "Senha ou email incorretos";
        }
    }
}

if (isset($_POST["cadastro"])) {
    header("Location: ./cadastro.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./css/workspace.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="bloco-login">
        <img src="./img/logo.png" />
        <div class="ItensLogin">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="email">Email</label><br>
                <input type="email" name="email" required><br><br>
                <label for="password">Senha</label><br>
                <input type="password" name="password" required><br><br>

                <input class="iniciar" type="submit" name="login" value="Login"><br><br>
            </form>
            <button><a href="./cadastro.php" class="btn">Ainda não sou cadastrado</a></button>
        </div>
        </form>
    </div>
</body>
</html>
