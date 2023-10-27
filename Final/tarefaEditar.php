<?php
session_start();
    require "./inc/logger.inc.php";
    $file_user = "./json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)){
        $old_file = json_decode(file_get_contents($file_user), true);
    }

    foreach ($old_file as $i) 
    {
        if (strcmp($i["titulo"], $_POST["to_change"]) == 0)
        {
            $target = array(
                "titulo"=> $i["titulo"],
                "prioridade" => $i["prioridade"],
                "data" => $i["data"],
                "descricao" => $i["descricao"]
            );
        }
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vê se todos os campo foram preenchidos
    if (isset($_POST["modTarefa"])) {

        $titulo     = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $prioridade = isset($_POST["prioridade"]) ? $_POST["prioridade"] : "";
        $data       = isset($_POST["data"]) ? $_POST["data"] : "";
        $descricao  = isset($_POST["descricao"]) ? $_POST["descricao"] : "";
        $original   = isset($_POST["original"]) ? $_POST["original"] : "";

        // Evitar repetir dados (mudar para o título)
        foreach ($old_file as $i) 
        {
            if (strcmp(str_replace(' ', '', $i["titulo"]), str_replace(' ', '', $original)) != 0 )
            {
                if ( strcmp(str_replace(' ', '', $i["titulo"]), str_replace(' ', '', $titulo) ) == 0 )
                {
                    echo 'O título <strong>'. $titulo .'</strong> já é utilizado por uma outra tarefa.<br>';
                    echo '<button><a href="index.php">Voltar</a></button>';
                    exit;
                }
            }
        }

        // Trata dados para escrita em arquivo
        $data = date("d.m.Y", strtotime($data));

        $mod_file  = [];    // string que irá armazenar os dados do arquivo

        foreach ($old_file as $j) 
        {
            if(strcmp($j["titulo"],$original)!=0)
            {
                $aux = array(
                    "titulo" => $j["titulo"],
                    "prioridade" => $j["prioridade"],
                    "data" => $j["data"],
                    "descricao" => $j["descricao"]
                );
                $mod_file[] = $aux;
            }
            else
            {
                $aux = array(
                    "titulo" => $titulo,
                    "prioridade" => $prioridade,
                    "data" => $data,
                    "descricao" => $descricao
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
        $registro = 'Tarefa editada: '. $original;
        atualizaLog($registro);

        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./css/workspace.css">
    <title>Editar tarefa</title>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <h1>Editar tarefa </h1>

        <label for="titulo">Título</label><br>
        <input type="text" name="titulo" value="<?php echo $target["titulo"] ?>" required><br><br>

        <label for="prioridade">Prioridade(1-3)</label><br>
        <input type="number" name="prioridade" min="1" max="3" value="<?php echo $target["prioridade"] ?>" required>
        * Prioridade 1 é a máxima <br><br>

        <label for="data">Data de vencimento: </label><br>
        <input type="date" name="data" required >
        * Data de vencimento original: <?php echo $target["data"] ?><br><br>


        <label for="desc">Descrição</label><br>
        <textarea name="descricao"><?php echo $target["descricao"] ?></textarea required><br>

        <input type="hidden" name="original" value="<?php echo $target["titulo"] ?>">

        <input type="submit" name="modTarefa" value="Enviar" /> 
        <button><a href="./index.php">Voltar</a></button>
    </form>
    
</body>
</html>