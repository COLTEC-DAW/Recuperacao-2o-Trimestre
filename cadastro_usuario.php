<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Cadastro</title>
    </head>
    <body class="container"> 
        <h1>Cadastre-se</h1>
        <h2>Efetue o cadastro:</h2>
        <form action="verifica_cadastro.php" method='post'>

            <label class= "dados" for="name">Nome: </label>
            <input class= "" type="text" name="name" required><br/><br/>

            <label class= "dados" for="email">E-mail:</label>
            <input class= "dados" type="email" id="email" name="email" required><br/><br/>

            <label class= "dados" for="nome_usuario">Usuário:</label>
            <input class= "dados" type="text" id="nome_usuario" name="nome_usuario" required><br/><br/>

            <label class= "dados" for="password">Senha:</label>
            <input class= "dados" type="password" id="password" name="password" required><br/><br/>
            
            <button type="submit">Enviar</button>
            <a href="index.php">Cancelar</a>
        </form>
    </body>
</html>