@extends('templates.template1')

@section('content')
    <div class="container-fluid">
        <br/>
        <h1>Resultados da Pesquisa</h1>

        @foreach($respostas as $resposta)
        <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start card">
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
@endsection