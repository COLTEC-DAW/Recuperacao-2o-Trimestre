<?php 
session_start(); 
require "./inc/logger.inc.php";

    $file_user = "./json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)){
        $old_file = json_decode(file_get_contents($file_user), true);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mod_file  = [];    // string que irá armazenar os dados do arquivo

    foreach ($old_file as $j) 
    {
        if(strcmp(str_replace(' ', '', $j["titulo"]), str_replace(' ','',$_POST["to_remove"]))!=0)
        {
            $aux = array(
                "titulo" => $j["titulo"],
                "prioridade" => $j["prioridade"],
                "data" => $j["data"],
                "descricao" => $j["descricao"]
            );
            
            $mod_file[] = $aux;
        }
    }

    // Limpa arquivo para reescrever
    $fp = fopen($file_user, "r+");
    ftruncate($fp, 0);
    fclose($fp);

    file_put_contents($file_user, json_encode($mod_file, JSON_PRETTY_PRINT));

    // Atualiza log de atividades 
    $registro = 'Tarefa removida: '. $_POST["to_remove"];
    atualizaLog($registro);

    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Excluir tarefa</title>
    <link rel="stylesheet" href="./css/workspace.css">
</head>
<body>
    <h1>Selecione uma tarefa: </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php 
            foreach ($old_file as $i) 
            {
                echo '<input type="radio" class="radio" name="to_remove" value="'.$i["titulo"].'">';
                echo '<label>'.$i["titulo"].'</label><br>';
            }
        ?>
      <input type="submit" name="rmvTarefa" value="Selecionar">
    </form>
    <button><a href="./index.php">Voltar</a></button>
</body>
</html>