<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <title>Gerencie seus exercicios</title>
</head>

<body class="container">
    <h1>Gerenciador de Lista de Exercicios</h1>

    <h2>Sua lista de exercícios: </h2>

    <form action="mostraExercicios.php" method="post">

        <input type="text" name="filtro">

        <button class="btn" type="submit">Filtrar por nome</button>
    </form><br/>


    <?php
    session_start();




    // mostra a tabela
    $filtro = $_POST["filtro"];

    $lista_usuarios = json_decode(file_get_contents("json/usuarios.json"));
    for ($i = 0; $i < count($lista_usuarios); $i++) 
    {
        if ($lista_usuarios[$i]->nome_usuario == $_SESSION['user']) 
        {
        ?>
            <table border="1" style="color: white;">
                <tr>
                    <th>Nome</th>
                    <th>Repetições</th>
                    <th>Tipo</th>
                    <th>Equipamento</th>
                    <th>Parte afetada</th>
                </tr>
                <?php
                foreach ($lista_usuarios[$i]->listaExercicios as $exercicio) 
                {   
                    //?Esse if faz o filtro funcionar, faz aparecer todos quando ir pela primeira vez, e faz aparecer todos se o filtro for nada
                    if ($exercicio->nome == $filtro || !($_SERVER["REQUEST_METHOD"] == "POST") || $filtro == "")
                    {
                    ?>
                        <tr>
                            <td><?= $exercicio->nome ?></td>
                            <td><?= $exercicio->repeticoes ?></td>
                            <td><?= $exercicio->tipo ?></td>
                            <td><?= $exercicio->equipamento ?></td>
                            <td><?= $exercicio->parte_afetada ?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </table>
        <?php
        }
    }
    ?>
    <br/>
    <a href="home.php">Voltar</a>
</body>

</html>