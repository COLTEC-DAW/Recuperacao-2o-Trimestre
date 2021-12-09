<?php
    session_start();
    $variavel = FALSE;
    $jsonF = file_get_contents("obras.json");
    $jsonDecod = json_decode($jsonF, true);
    if($jsonDecod == NULL){
        echo("Nenhuma obra adicionada");
    }else{
       if(isset($_POST["pesquisa"])){
           $_SESSION["pesquisa"] = $_POST["nome"]; 
            $pesquisa_nome = array();
            if($_POST["pesquisa"] == "nome"){
                header("Location: pesquisa_nome.php");
            }
            if($_POST["pesquisa"] == "autor"){
                header("Location: pesquisa_autor.php");
            }
            if($_POST["pesquisa"] == "editora"){
                header("Location: pesquisa_editora.php");
            }
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina inicial</title>
    </head>
    <body>
        <h1>Bem Vindo à biblioteca!</h1>
        <h2>Buscar por:</h2>
        <form method="post">
        <input type="text" name="nome"> <br>
        Selecione uma opção: <br>  
        <input type=radio name=pesquisa value="nome"> Nome
        <input type=radio name=pesquisa value="autor"> Autor
        <input type=radio name=pesquisa value="editora"> Editora <br><br>
        <input type=submit style= 'width: 160px;;height: 25px;'><br><br>
        </form>
        <?php
            $jsonF = file_get_contents("obras.json");
            $jsonDecod = json_decode($jsonF);
            
            if($jsonDecod == NULL){
                echo("<h2>Nenhuma obra adicionada</h2>");
                $variavel = TRUE;
            }else{
                echo("<h2>Catálogo:</h2>");
                $obras = 0;
                echo("<div id='tabela'><table>
                <tr>
                    <th>Nome do livro</th>
                    <th>Resumo da obra</th>
                    <th>Nome do autor</th>
                    <th>Nome da editora</th>
                    <th>Número de exemplares</th>
                    <th>Lançamento</th>
                </tr>");
                foreach($jsonDecod as $obra){
                    $obras++;
                    echo("<tr>");
                    echo("<td>$obra->nome</td>");
                    echo("<td>$obra->resumo</td>");
                    echo("<td>$obra->nome_autor</td>");
                    echo("<td>$obra->nome_editora</td>");
                    echo("<td>$obra->num_exemplares</td>");
                    echo("<td>$obra->data</td>");
                    echo("</tr>");
                }
                echo("</div></table><br><br>");
                $variavel = TRUE;
            }
            
            if($variavel == TRUE){
                echo("<form method='get' action='cadastro.php'>
                <button type='submit' style='width: 160px;;height: 50px;'>Adicionar uma obra!</button>
                </form><br>");
            }
            
        ?>
        <footer>
            <?php
                echo("<h2>Historico:</h2>");
                if(isset($_COOKIE["nome"])){
                    echo("<h3><br> Ultimo livro pesquisado: " . $_COOKIE["nome"] . "</h3>");
                }
                if(isset($_COOKIE["autor"])){   
                    echo("<h3>Ultimo autor pesquisado: " . $_COOKIE["autor"] . "</h3>");
                }
                if(isset($_COOKIE["editora"])){
                    echo("<h3>Ultima editora pesquisada: " . $_COOKIE["editora"] . "</h3>");
                }
            ?>
        </footer>
    </body>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        text-align: center; 
        width: 50%;
        }

        td, th{
        border: 1px solid #dddddd;
        padding: 8px;
        }

        tr:nth-child(even){
        background-color: #dddddd;
        }
    </style>
</html>

