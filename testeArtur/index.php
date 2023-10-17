<?php
session_start();

if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
}

echo '<pre>';
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";
echo '</pre>';

$nameFile = $_SESSION["user"]["userName"] . ".json";
$actualUser = $_SESSION["user"]["userName"];

$userFile = fopen("./json/".$nameFile, 'a');

echo '<h1> Tarefas de <i>'. $_SESSION["user"]["userName"].'</i></h1>';
if ( 0 == filesize( $file_path ) )
{
    echo 'Nehuma tarefa registrada <br>';
}
/*
if(!isset($_SESSION["usuario_logado"])){
    header("Location: login.php");
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--<link rel="stylesheet" href="./style.css">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina-Princial</title>
</head>
<body>
    <li> 
    <hr>
        <ul> <a href="novaTarefa.php">Registrar nova tarefa</a></ul>
        <ul> <a href="excluirTarefa.php">Excluir tarefa</a></ul>
        <ul> <a href="alterarSenha.php">Alterar Senha</a></ul>
    </li>
    <form method="post" action="login.php">
        <button type="submit">Sair</button>
    </form>
</body>
</html>

<?php
    fclose($userFile);
?>