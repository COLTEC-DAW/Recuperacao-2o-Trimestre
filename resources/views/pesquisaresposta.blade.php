<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pesquisa</title>
</head>
<body>

    <div class="container-fluid">
        <h1>Resultados da Pesquisa</h1>

        @foreach($respostas as $resposta)
        <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$resposta->nome}}</h5>
                    <small>{{$resposta->created_at}}</small>
                </div>
                <small>Autor:{{$resposta->autor}}</small>
                <p class="mb-1">{{$resposta->resumo}}</p>
                <small>Editora: {{$resposta->editora}}</small>
            </a>
        </div>
        <br/>
        @endforeach
    </div>

</body>
</html>
