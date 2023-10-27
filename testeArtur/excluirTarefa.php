<?php
session_start();
    require "./inc/objetificador.inc.php";
    $objarray = gerarObjArray();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmp_list  = [];    // string que irá armazenar os dados do arquivo
    $file_name = "./json/".$_SESSION["user"]["userName"] . ".json";

    // Limpa arquivo para reescrever
    $fp = fopen($file_name, "r+");
    ftruncate($fp, 0);
    fclose($fp);

    foreach ($objarray as $j) 
    {
        if(strcmp($j->titulo,$_POST["to_remove"])!=0)
        {
            $aux = array(
                "titulo" => $j->titulo,
                "prioridade" => $j->prioridade,
                "data" => $j->data,
                "descricao" => $j->descricao
            );
            
            $tmp_list[] = $aux;
        }
    }

    file_put_contents($file_name, json_encode($tmp_list, JSON_PRETTY_PRINT));
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Excluir Tarefa</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php 
            foreach ($objarray as $i) 
            {
                echo '<input type="radio" name="to_remove" value="'.$i->titulo.'">';
                echo '<label>'.$i->titulo.'</label><br>';
            }
        ?>
      <input type="submit" name="rmvTarefa" value="Selecionar">
    </form>
    <button><a href="./index.php">Voltar</a></button>
</body>
</html>