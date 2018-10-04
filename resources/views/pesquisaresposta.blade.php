@extends('templates.template1')

@section('content')
    <div class="container-fluid">
        <br/>
        <h1>Resultados da Pesquisa</h1>

        @foreach($respostas as $resposta)
        <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start card">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">{{$resposta->nome}}</h4>
                    <small>{{$resposta->created_at}}</small>
                </div>
                <p class="mb-1">{{$resposta->resumo}}</p>
                <br/>
                <small>{{$resposta->autor}}</small> 
                <div class="d-flex w-100 justify-content-between">
                    <small>Editora: {{$resposta->editora}}</small>
                    <small>N° Exemplares: {{$resposta->num_exemplares}}</small>
                </div>    
            </a>
        </div>
        <br/>
        @endforeach
    </div>
@endsection