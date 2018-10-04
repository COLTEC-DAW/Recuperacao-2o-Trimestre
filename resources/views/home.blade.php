@extends('templates.template1')

@section('content')
    <div class="container-fluid">
        
        @if (session('inserido'))

        <br/>
        <div class="alert alert-success col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            {{ session('inserido') }}
        </div>

        @endif
        <br/>
        
        <h1 id="title">Últimas Obras</h1>
        <br/>

        @foreach($obras as $obra)
            <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start card">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="mb-1">{{$obra->nome}}</h4>
                        <small>{{$obra->created_at}}</small>
                    </div>
                    <p class="mb-1">Autor: {{$obra->autor}}</p>
                    <div class="d-flex w-100 justify-content-between">
                        <small>Editora: {{$obra->editora}}</small>
                        <small>N° Exemplares: {{$obra->num_exemplares}}</small>
                    </div>
                </a>
            </div>
            <br/>
        @endforeach
    </div>
@endsection