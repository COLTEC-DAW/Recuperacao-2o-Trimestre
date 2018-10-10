@extends('layouts.app')

@section('content')

        <div class="row">
            @foreach($obras as $obrasp)
                  <div class="card col-12 col-md-6 col-lg-4" style="width: 100rem;">
                      <div class="card-body">
                          <h5 class="card-title">{{$obrasp->nome}}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{$obrasp->autor}}</h6>
                          <p class="card-text">{{$obrasp->resumo}}</p>
                          <small>Editora: {{$obrasp->editora}}</small>
                          <small>N° exemplares: {{$obrasp->exemplares}}</small>
                      </div>
                  </div>
            @endforeach
        </div>
@endsection
