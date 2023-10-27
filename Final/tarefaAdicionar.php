<?php
session_start();
    require "./inc/logger.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicialize $usersExisting como um array vazio se não houver dados no arquivo
    $tarefas = [];
    $file_user = "./json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)) {
        $tarefas = json_decode(file_get_contents($file_user), true);
    }

    // Vê se todos os campo foram preenchidos
    if (isset($_POST["addTarefa"])) {
        $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
        $prioridade = isset($_POST["prioridade"]) ? $_POST["prioridade"] : "";
        $data = isset($_POST["data"]) ? $_POST["data"] : "";
        $descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : "";

        // Evitar repetir dados (mudar para o título)
        foreach ($tarefas as $t)
        {
            if (strcmp(str_replace(' ', '', $t["titulo"]), str_replace(' ', '',$titulo))) 
            {
                echo 'O título <strong>'. $titulo .'</strong> já é utilizado por uma outra tarefa.<br>';
                echo '<button><a href="novaTarefa.php">Voltar</a></button>';
            }
        }

        // Trata dados para escrita em arquivo
        $data = date("d.m.Y", strtotime($data));
        $nova_tarefa = array(
            "titulo" => $titulo,
            "prioridade" => $prioridade,
            "data" => $data,
            "descricao" => $descricao
        );
        
        $tarefas[] = $nova_tarefa;
        file_put_contents($file_user, json_encode($tarefas, JSON_PRETTY_PRINT));

        // Atualiza log de atividades 
        $registro = 'Tarefa adicionada: '. $titulo ;
        atualizaLog($registro);

        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./css/workspace.css">
    <title>Adicionar tarefa</title>
</head>
<body>

    <form method="post" class="form-tarefa" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Nova tarefa </h1>

        <label for="titulo">Título</label><br>
        <input type="text" name="titulo" required><br><br>


        <label for="prioridade">Prioridade(1-3)</label> <br>
        <input type="number" name="prioridade" min="1" max="3" required>
        * Prioridade 1 é a máxima <br><br>

        <label for="data">Prazo </label><br>
        <input type="date" name="data" required><br><br>


        <label for="desc">Descrição</label><br>
        <textarea name="descricao"> </textarea required><br>

        <input type="submit" name="addTarefa" value="Enviar" /> 
        <button><a href="./index.php">Voltar</a></button>
    </form>
    
</body>
</html>