@extends('layouts.app')

@section('content')


            @foreach($obras as $obrasp)
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$obrasp->nome}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$obrasp->autor}}</h6>
                        <p class="card-text">{{$obrasp->resumo}}</p>
                        <small>Editora: {{$obrasp->editora}}</small>
                        <small>N° exemplares: {{$obrasp->exemplares}}</small>
                    </div>
                </div>

                <br>
            @endforeach

@endsection