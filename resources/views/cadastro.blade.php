@extends('templates.template2')

@include('includes.menu')

@section('content')
    @if( isset($errors) && count($errors) > 0 )
        <div class=" alert alert-danger">
            @foreach ( $errors->all() as $error )
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif   
    <div id="container_login" class="align-self-center col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-12 ">          
        <div id="box" class="row">
            <div id="bienvenido" class="d-flex justify-content-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2>Cadastre-se</h2>
            </div>
            <div id="formulario" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{URL::to('/guardarRegistro')}}" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput" name="nome" value="{{old('nome')}}" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput" name="email" value="{{old('email')}}" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="formGroupExampleInput2" name="senha"  placeholder="Senha">
                    </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div id="buttons_box" >
                        <button type="submit" id="botao_confirmarCadastro" class="btn btn-primary btn-lg btn-sm">Pronto!</button>
                        <a href="/" class="btn btn-danger btn-lg btn-sm">Cancelar</a>
                    </div>    
                </form>
            </div>          
        </div>  
    </div>
@endsection
