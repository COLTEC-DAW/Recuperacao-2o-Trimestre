<?php
    $entrada = htmlspecialchars($_POST["tipo"]);

    function login_call ($where) 
    {
        echo '<form action="';
        echo $where;
        echo '"method="post">
                Usuário: <input type="text" name="user"><br>
                Senha: <input type="password" name="pass"><br>
                <input type="submit" value=Seguir>
            </form> ';

        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $entrada; ?></title>
</head>
<body>

    <?php
        if ($entrada == "Login") 
        {
            echo '<h1>Entrar</h1>';
            login_call("next.php");
        }
        else
        {
            echo '<h1>Cadastrar</h1>';
            login_call("index.html");
        }
    ?>
    
</body>
</html>