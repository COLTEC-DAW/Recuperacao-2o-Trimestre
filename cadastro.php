<?php
    include "obra_classe.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
    </head>
    <body>
        <h1>Cadastro:</h1>
        <form method="post">
            Nome do livro:    <input type="text" name="nome"> <br>
            Resumo do livro:  <input type="text" name="resumo"> <br>
            Nome do autor:    <input type="text" name="nome_autor"> <br>
            Nome da editora:  <input type="text" name="nome_editora"> <br>
            Nº de exemplares: <input type="number" name="num_exemplares"> <br>
            Data de cadastro da obra: <input type="date" name="data"> <br>
            <input type= "submit" name="cadastro">
        </form>
        <form method="get" action="index.php">
            <button type="submit">Voltar para o inicio!</button>
        </form>
    </body>
    <style>
        *{
            text-align: center;        
        }
        form{
            font-size: 20px;
        }
    </style>
</html>

<?php 
    if(isset($_POST["nome"])){

        $nova_obra = new Obra(
            $_POST["nome"],
            $_POST["resumo"],
            $_POST["nome_autor"],
            $_POST["nome_editora"],
            $_POST["num_exemplares"],
            $_POST["data"]
        );
        
        $obra_array = array(
            "nome" => $nova_obra->GetNome(),
            "resumo" => $nova_obra->GetResumo(),
            "nome_autor" => $nova_obra->GetNome_autor(),
            "nome_editora" => $nova_obra->GetNome_editora(),
            "num_exemplares" => $nova_obra->GetNum_exemplares(),
            "data" => $nova_obra->GetData()
        );
        
        $jsonF = file_get_contents("obras.json");
        $jsonDecod = json_decode($jsonF, true);
        $jsonDecod[] = $obra_array;
        $jsonF = json_encode($jsonDecod, JSON_PRETTY_PRINT);
        file_put_contents("obras.json", $jsonF);

        header("Location: index.php");
    }

    
?>