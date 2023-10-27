<?php
session_start();

    $file_user = "./json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)){
        $old_file = json_decode(file_get_contents($file_user), true);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./css/workspace.css">
    <title>Seleciona Tarefa</title>
</head>
<body>
    <h1>Selecione uma tarefa: </h1>
    <form method="post" action="./tarefaEditar.php">
        <?php 
            foreach ($old_file as $i) 
            {
                echo '<input type="radio" class="radio" name="to_change" value="'.$i["titulo"].'">';
                echo '<label>'.$i["titulo"].'</label><br>';
            }
        ?>
        <input type="submit" name="target" value="Selecionar">
        <button><a href="./index.php">Voltar</a></button>
    </form>
</body>
</html>