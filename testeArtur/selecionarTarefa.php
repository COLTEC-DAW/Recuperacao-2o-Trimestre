<?php
session_start();
    require "./inc/objetificador.inc.php";
    $objarray = gerarObjArray();
    $prox_path;
    if ( strcmp($_POST["option"],"Excluir tarefa") == 0)
    {
        $prox_path = "./excluirTarefa.php";
    } 
    else
    {
        $prox_path = "./editarTarefa.php";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleciona Tarefa</title>
</head>
<body>
    <form method="post" action="<?php echo $prox_path; ?>">
        <?php 
            foreach ($objarray as $i) 
            {
                echo '<input type="radio" name="alvo" value="'.$i->titulo.'">';
                echo '<label>'.$i->titulo.'</label><br>';
            }
        ?>
      <input type="submit" name="keyTarefa" value="Selecionar">
    </form>
    <button><a href="./index.php">Voltar</a></button>
</body>
</html>