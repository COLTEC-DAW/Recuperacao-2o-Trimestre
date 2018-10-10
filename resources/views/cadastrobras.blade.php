@extends('layouts.app')

@section('content')
    
    <form action="{{URL::to('/cadastrarlivro')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Nome da Obra</label>
            <input type="text" class="form-control" id="1" name="nome" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Resumo</label>
            <input type="text" class="form-control" id="2"  name="resumo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <input type="text" class="form-control" id="3"  name="autor">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Editora</label>
            <input type="text" class="form-control" id="4"  name="editora">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">N° Exemplares</label>
            <input type="integer" class="form-control" id="5"  name="exemplares">
        </div>
        <button type="submit" hrefclass="btn btn-primary">Cadastrar a nova obra!</button>
        <a href="/home" class="btn btn-danger btn-lg btn-sm">Cancelar</a>
    </form>

@endsection