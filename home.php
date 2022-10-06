<!DOCTYPE html>
<html lang="pt-br">
    <!-- essa pagina é para quando voce já esta logado -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Gerencie seus exercicios</title>
</head>
<body class="container">
    <h1>Gerenciador de Lista de Exercicios</h1>
    <h3> Aqui voce pode ver sua lista de exercicios, adicionar elementos a ela ou então deslogar</h3>
    <h3>Insira os dados do exercicio abaixo:</h3><br/><br/>

    <form action="adicionaExercicio.php" method="post">

        <label class= "dados" for="repeticoes">Número de repetições:</label>
        <input type="number" name="repeticoes" required>
        <br/><br/>

        <label class= "dados" for="exercicio">Descrição do exercicio:</label>
        <input type="text" name="exercicio" required>
        <br/>

        
        <label class="dados" for="tipo">Selecione o tipo de exercicio</label>
        <select class="form-select" aria-label="Default select example" name="tipo" required>
            <option value="" selected disabled>Selecionar</option>
            <option name = "tipo" value="Aeróbico">Aeróbico</option>
            <option name = "tipo" value="Anaeróbico">Anaeróbico</option>
            <option name = "tipo" value="Ambos">Ambos</option>

        </select><br/><br/><br/><br/>


        <label class="dados" for="equipamento">Selecione o equipamento necessário do exercicio</label>
        <select required class="form-select" aria-label="Default select example" name="equipamento">
            <option value="" selected disabled>Selecionar</option>
            <option name = "equipamento" value="Esteira">Esteira</option>
            <option name = "equipamento" value="Bicicleta">Bicicleta</option>
            <option name = "equipamento" value="Elíptico">Elíptico</option>
            <option name = "equipamento" value="Nenhum">Nenhum</option>

        </select><br/><br/><br/><br/>

        <label class="dados" for="parte_afetada">Selecione o parte do corpo afetada necessário do exercicio</label>
        <select required class="form-select" aria-label="Default select example" name="parte_afetada">
            <option value="" selected disabled>Selecionar</option>
            <option name = "parte_afetada" value="Tronco">Tronco</option>
            <option name = "parte_afetada" value="Pernas">Pernas</option>
            <option name = "parte_afetada" value="Ambas">Ambas</option>

        </select><br/><br/><br/>

        <button type="submit">Adicionar</button><br/><br/>
        <a href="mostraExercicios.php">Veja sua lista de exercícios</a>
        <a href="logout.php">Encerrar sessão</a>
    </form><br/>

</body>
</html>