<?php
session_start();

if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
}

echo '<pre style="background-color:gray">';
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";
echo '</pre>';

$file_name = "./json/".$_SESSION["user"]["userName"] . ".json";
$actualUser = $_SESSION["user"]["userName"];

echo 
'
    <div style="text-align:right">
        <button name="alterar"><a href="./alterarSenha.php">Alterar Senha</a></button>
        <form method="post" action="./login.php">
            <button type="submit">Sair</button>
        </form>
    </div>
';
echo '<h1> Tarefas de <i>'. $_SESSION["user"]["userName"].'</i></h1>';

echo '

    <button><a href="./novaTarefa.php">Registrar nova tarefa</a></button>
    <button><a href="./excluirTarefa.php">Excluir tarefa </a></button>
    <button><a href="./inc/ordenarPri.inc.php">Listar por prioridade </a></button>
    <button><a href="./ordernarData.php">Listar por data de vencimento </a></button>
    <form method=post action="selecionarTarefa.php">
        <input type="radio" name="option" value="Editar tarefa">
        <label> Editar tarefa </label><br>
        <input type="submit" value="Ir">
    </form>

    <hr>
';

if (file_exists($file_name))
{   // Verifique se a decodificação foi bem-sucedida
    $tarefas = json_decode(file_get_contents($file_name), true);
    foreach ($tarefas as $t)
    {
        echo '<h3>' . $t["prioridade"] . '. '.$t["titulo"].'</h3>';
        echo '<p>'.$t["descricao"].'</p>';
    }
} 
else 
{
    echo 'Nehuma tarefa registrada <br>';
}
 
if(!isset($_SESSION["usuario_logado"])){
    header("Location: ./login.php");
}
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
</body>
</html>