<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicialize $usersExisting como um array vazio se não houver dados no arquivo
    $tarefas = [];
    $file_name = "./json/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_name)) {
        $tarefas = json_decode(file_get_contents($file_name), true);
        // Verifique se a decodificação foi bem-sucedida
      
    }

    // Vê se todos os campo foram preenchidos
    if (isset($_POST["addTarefa"])) {
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $prioridade = isset($_POST["prioridade"]) ? $_POST["prioridade"] : "";
        $data = isset($_POST["data"]) ? $_POST["data"] : "";
        $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

        // Evitar repetir dados (mudar para o título)
        foreach ($tarefas as $t) {
            if ($t["titulo"] === $titulo) {

                echo 'O título <strong>'. $titulo .'</strong> já é utilizado por uma outra tarefa.<br>';
                echo '<button><a href="novaTarefa.php">Voltar</a></button>';
                exit;
                

            }
        }

        // Trata dados para escrita em arquivo
        $data = date("d.m.Y");
        $nova_tarefa = array(
            "titulo" => $titulo,
            "prioridade" => $prioridade,
            "data" => $data,
            "descricao" => $descricao
        );
        
        $tarefas[] = $nova_tarefa;
        file_put_contents($file_name, json_encode($tarefas, JSON_PRETTY_PRINT));

        header("Location: index.php");
        exit;
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
    <h1>Nova tarefa </h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="titulo">Título</label><br>
        <input type="text" name="titulo" required><br><br>


        <label for="prioridade">Prioridade(1-3):</label>
        <input type="number" name="prioridade" min="1" max="3" required>
        * Prioridade 1 é a máxima <br>

        <label for="data">Data de vencimento: </label>
        <input type="date" name="data" required><br><br>


        <label for="desc">Descrição</label><br>
        <textarea name="descricao"> </textarea required><br>

        <input type="submit" name="addTarefa" value="Enviar" /> 
    </form>
    
</body>
</html>