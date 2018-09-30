@extends('templates.template2')

@section('content')
    @if (session('wrong'))
            
        <br/>
        <div class="alert alert-danger">
                {{ session('wrong') }}
        </div>

    @endif

    @if (session('success'))

        <br/>
        <div class="alert alert-success">
                {{ session('success') }}
        </div>

    @endif
    <div id="container_login" class="align-self-center col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-12 ">
        <div id="box" class="row">
            <div id="bienvenido" class="d-flex justify-content-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h2>Faça seu login</h2>
            </div>             
            <div id="formulario" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{URL::to('/confereLogin')}}" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" value="confirmar" class="btn btn-primary btn-lg btn-block">Entrar</button>
                    <a href="{{URL::to('/registrar')}}">Registrar</a>
                </form>
            </div>    
        </div>    
        
        @if( isset($errors) && count($errors) > 0 )
            <div class=" alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif  

    </div>
@endsection
