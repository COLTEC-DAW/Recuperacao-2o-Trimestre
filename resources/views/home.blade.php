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
                        @foreach($obras as $obrasp)
                        <tr>
                            <td>{{$obrasp->nome}}</td>
                            <td>{{$obrasp->resumo}}</td>
                            <td>{{$obrasp->autor}}</td>
                            <td>{{$obrasp->editora}}</td>
                            <td>{{$obrasp->exemplares}}</td>
                        </tr>
                        @endforeach
                    <a href="/cadastrar"><br>Adicionar Obras</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
