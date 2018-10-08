@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Página home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <tr>
                        </tr>
                        @foreach($obrasp as $obras)
                        <tr>
                            <td>{{$obras->nome}}</td>
                            <td>{{$obras->resumo}}</td>
                            <td>{{$obras->autor}}</td>
                            <td>{{$obras->editora}}</td>
                            <td>{{$obras->exemplares}}</td>
                        </tr>
                        @endforeach
                    <a href="/cadastrar"><br>Adicionar Obras</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
