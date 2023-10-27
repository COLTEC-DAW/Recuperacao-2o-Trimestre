<?php
session_start();
    require "./inc/objetificador.inc.php";
        $objarray = gerarObjArray();

        foreach ($objarray as $j) {
            if(strcmp($j->titulo,$_POST["alvo"]) == 0)
            {
                $edit_key = $j;
                $titulo_antigo = $_POST["alvo"];
            }
        }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tmp_list  = [];
    $file_name = "./json/".$_SESSION["user"]["userName"] . ".json";
    
    // Vê se todos os campo foram preenchidos
    if (isset($_POST["modTarefa"])) {
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $prioridade = isset($_POST["prioridade"]) ? $_POST["prioridade"] : "";
        $data = isset($_POST["data"]) ? $_POST["data"] : "";
        $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

        // Evitar repetir dados (mudar para o título)
        /*
        foreach ($objarray as $t) {
            if (strcmp($titulo,$edit_key->titulo) != 0)
            {
                if (strcmp($t->titulo,$titulo) == 0)  {

                    echo 'O título <strong>'. $titulo .'</strong> já é utilizado por uma outra tarefa.<br>';
                    echo '<button><a href="editarTarefa.php">Voltar</a></button>';
                    exit;
                }
            }
        }
        */

        // Trata dados para escrita em arquivo
        $data = date("d.m.Y");
        $aux_key = new Tarefa($titulo, $prioridade, $data, $descricao);
        $new_objs = [];

        // Limpa arquivo para reescrever
        $fp = fopen($file_name, "r+");
        ftruncate($fp, 0);
        fclose($fp);

        // Atualiza objarray
        foreach ($objarray as $j) 
        {
            if(strcmp($j->titulo,$titulo_antigo) == 0) {
                $new_objs[] = $aux_key;
            } 
            else {
                $new_objs[] = $j;
            }
        }

        foreach ($new_objs as $j) 
        {
            $aux = array(
                "titulo" => $j->titulo,
                "prioridade" => $j->prioridade,
                "data" => $j->data,
                "descricao" => $j->descricao
            );
            
            $tmp_list[] = $aux;
        }


        file_put_contents($file_name, json_encode($tmp_list, JSON_PRETTY_PRINT));
        header("Location: index.php");
    }
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
    <h1>Editar tarefa </h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="titulo">Título</label><br>
        <input type="text" name="titulo" value="<?php echo $edit_key->titulo ?>" required><br><br>


        <label for="prioridade">Prioridade(1-3):</label>
        <input type="number" name="prioridade" min="1" max="3" value="<?php echo $edit_key->prioridade ?>" required>
        * Prioridade 1 é a máxima <br>

        <label for="data">Data de vencimento: </label>
        <input type="date" name="data" required >
        <!--* Data de vencimento original: <?php echo $edit_key->data ?>--><br><br>


        <label for="desc">Descrição</label><br>
        <textarea name="descricao"><?php echo $edit_key->descricao ?></textarea required><br>

        <button><a href="./index.php">Voltar</a></button>
        <input type="submit" name="modTarefa" value="Enviar" /> 
    </form>
    
</body>
</html>