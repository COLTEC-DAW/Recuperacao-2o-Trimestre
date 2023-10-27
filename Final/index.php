<?php
session_start();

if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
}

$file_user = "./json/users/".$_SESSION["user"]["userName"] . ".json";
$username = $_SESSION["user"]["userName"];

echo 
'
    <div class="top-buttons" >
        <button name="alterar"><a href="./alterarSenha.php">Alterar Senha</a></button>
        <button name="sair"><a href="./inc/logout.inc.php">Sair</a></button>
    </div>
';

echo 
'
    <div class ="main">
    <div class ="view-actions">

        <h1> Tarefas de <i>'. $_SESSION["user"]["userName"].'</i></h1>

        <button><a href="./tarefaAdicionar.php">Adicionar tarefa</a></button>
        <button><a href="./tarefaExcluir.php">Excluir tarefa </a></button>
        <button><a href="./tarefaSelecionar.php">Editar tarefa </a></button><br>
        <button><a href="./inc/sortPrioridade.inc.php">Listar por prioridade </a></button>
        <button><a href="./inc/sortData.inc.php">Listar por data de vencimento </a></button><br>
    </div>
';

echo '<div class="view-content"> <hr>';
if (filesize($file_user) > 2) 
{   // Verifique se a decodificação foi bem-sucedida
    $tarefas = json_decode(file_get_contents($file_user), true);

    foreach ($tarefas as $t)
    {
        echo '<div class="row-tarefas">';
        echo '<strong>'.$t["titulo"].'</strong>'  ;
        echo '<p class="entrega">Prazo: '.$t["data"].' - Prioridade: ' .$t["prioridade"] . '</p>';
        echo '<p class="descricao">'.$t["descricao"].'</p>';
        echo '</div>';
    }
} 
else 
{
    echo 'Nehuma tarefa registrada <br>';
}
echo '</div>';
echo '</div>';
 
if(!isset($_SESSION["usuario_logado"])){
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Início</title>
    <link rel="stylesheet" href="./css/workspace.css">
    <style> html { background-color: #181a1b; } </style>
</head>
<body>
</body>
</html>