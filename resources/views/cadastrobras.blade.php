<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Formulário de Cadastro</title>
</head>
<body>
    
    <form action="{{URL::to('/cadastrarlivro')}}" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome da Obra</label>
            <input type="text" class="form-control" id="1" value="POST" name="nome" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Resumo</label>
            <input type="text" class="form-control" id="2" value="POST" name="resumo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <input type="text" class="form-control" id="3" value="POST" name="autor">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Editora</label>
            <input type="text" class="form-control" id="4" value="POST" name="editora">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">N° Exemplares</label>
            <input type="integer" class="form-control" id="5" value="POST" name="exemplares">
        </div>
        <button type="submit" hrefclass="btn btn-primary">Cadastrar a nova obra!</button>
        <a href="/login" class="btn btn-danger btn-lg btn-sm">Cancelar</a>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>