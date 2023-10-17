<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicialize $usersExisting como um array vazio se não houver dados no arquivo
    $nameFile = $_SESSION["user"]["userName"] . ".json";

    if (file_exists($nameFile)) {
        $usersExisting = json_decode(file_get_contents($nameFile), true);
        // Verifique se a decodificação foi bem-sucedida
      
    }

    // Vê se todos os campo foram preenchidos
    if (isset($_POST["signUp"])) {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $userName = isset($_POST["userName"]) ? $_POST["userName"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Evitar repetir dados (mudar para o título)
    
    foreach ($usersExisting as $user) {
        if ($user["email"] === $email) {
            echo "Este email já está cadastrado. Tente logar!";
            exit;
        }
    }

    // Trata dados para escrita em arquivo
        $data = date("d/m/Y H:i");
        $user = array(
            "email" => $email,
            "userName" => $userName,
            "password" => $password,
        );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nova tarefa </h1>

    <form method="post" action="index.php">

        <label for="titulo">Título</label><br>
        <input type="text" name="titulo" required><br><br>


        <label for="prioridade">Prioridade(1-3):</label>
        <input type="number" name="prioridade" min="1" max="3" required>
        * Prioridade 1 é a máxima <br>

        <label for="data">Data de vencimento: </label>
        <input type="date" name="data" required><br><br>


        <label for="desc">Descrição</label><br>
        <textarea> </textarea required><br>

        <input type="submit" name="addTarefa" value="Enviar" /> 
    </form>
    
</body>
</html>