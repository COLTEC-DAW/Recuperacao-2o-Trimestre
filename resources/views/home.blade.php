@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>BiblioRec</title>
     <style>
        #barrinha {
            background-color: #b5d9f3;
        }

        #titulo{
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light" id="barrinha">
        <a class="navbar-brand" href="#" id="titulo">
            <img src="coltec.png" width="85" height="50" class="d-inline-block align-top" alt="">
                Biblioteca do Coltec
                </a>
                <span class="navbar-text">
                    Seja bem vindo ao nosso sistema bibliotecário!
                  </span>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Digite sua busca" aria-label="Search">
                    <button class="btn s my-2 my-sm-0 btn-primary" id="botao" type="submit">Pesquisar</button>
                  </form>
            </nav>

            @foreach($obras as $obrasp)
                <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start card">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 class="mb-1">{{$obrasp->nome}}</h4>
                        </div>
                        <p class="mb-1">{{$obrasp->resumo}}</p> 
                        <br/>
                        <small>{{$obrasp->autor}}</small>
                        <div class="d-flex w-100 justify-content-between">
                            <small>Editora: {{$obrasp->editora}}</small>
                            <small>N° Exemplares: {{$obrasp->exemplares}}</small>
                        </div>
                    </a>
                </div>
                <br/>
            @endforeach

<!--------------------------------------------------------------------------------------------->    
    <div class="row">
        <div class="col-12 col-sm-5 col-md-4 col-xl-2" id="agr">
            <div id="list" class="list-group">
                <a class="list-group-item list-group-item-action nav-link list-group-item-primary" href="#list-item-2">Cadastrar Obras</a>
                <a class="list-group-item list-group-item-action nav-link list-group-item-primary" href="#list-item-3">Informações</a>
                <a class="list-group-item list-group-item-action nav-link list-group-item-primary" href="#list-item-4">Desconectar</a>
             </div>
        </div>
    </div>
</body>
</html>

@endsection