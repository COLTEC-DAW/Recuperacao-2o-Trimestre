<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <title>Gerencie seus exercicios</title>
</head>
<body class="container">
    <h1>Gerenciador de Lista de Exercicios</h1>

    <h3>Entre ou cadastre-se para gerenciar seus exercícios de academia</h3>
    <form action="verifica_login.php" method="post">
            <label class= "dados" for="user">Usuário:</label>
            <input type="text" name="user" required><br/><br/>

            <label class= "dados" for="password">Senha:</label>
            <input type="password" name="password" required><br/><br/>

            <button class="btn" type="submit">Entrar</button>
            <a href="cadastro_usuario.php">Cadastrar</a>
    </form>
</body>
</html>