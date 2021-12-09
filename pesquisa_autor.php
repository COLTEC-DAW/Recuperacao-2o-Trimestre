<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION["obras"] = array();
        $_SESSION["num_obras"] = 0;

        $jsonF = file_get_contents("obras.json");
        $jsonDecod = json_decode($jsonF);
        if($jsonDecod == NULL){
            echo("Nenhuma obra adicionada");
        }else{
                $obras = 0;
                foreach($jsonDecod as $obra){
                    if($_SESSION["pesquisa"] == $obra->nome_autor){
                        setcookie("autor",$_SESSION["pesquisa"], time()+1000);
                        $obras++;
                        $_SESSION["obras"][] = $obra;
                        $_SESSION["num_obras"]++;
                        if($obras == 1){
                            echo("<h1>Resultado:</h1>");
                            echo("<div id='tabela'><table>
                            <tr>
                                <th>Nome do livro</th>
                                <th>Resumo da obra</th>
                                <th>Nome do autor</th>
                                <th>Nome da editora</th>
                                <th>Número de exemplares</th>
                                <th>Lançamento</th>
                            </tr>");
                        }
                        echo("<tr>");
                        echo("<td>$obra->nome</td>");
                        echo("<td>$obra->resumo</td>");
                        echo("<td>$obra->nome_autor</td>");
                        echo("<td>$obra->nome_editora</td>");
                        echo("<td>$obra->num_exemplares</td>");
                        echo("<td>$obra->data</td>");
                        echo("</tr>");
                    }
                }
                if($obras > 0){
                    echo("</div></table><br><br>");  
                }
                if($_SESSION["num_obras"] == 0){
                    echo("Nenhuma obra encontrada");
                }
        }
    ?>
    <form method="get" action="index.php">
        <button type="submit">Voltar para o inicio!</button>
    </form>
    <style>
       table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
        text-align: center; 
        }

        td, th{
        border: 1px solid #dddddd;
        padding: 8px;
        }

        tr:nth-child(even){
        background-color: #dddddd;
        }
        form{
            font-size: 20px;
        }
    </style>
</body>
</html>

