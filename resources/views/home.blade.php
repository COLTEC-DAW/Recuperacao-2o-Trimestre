@extends('layouts.app')

@section('content')


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

@endsection