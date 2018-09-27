<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Adicionar Obra</title>

    <style>
    
        body{
        background: #3B7F78;
        }

        #bienvenido{
            margin-top: 5%;
        }

        #container_login{
            min-height: 100%;
            display: flex;
            align-items: center;
        }

        #cadastro_box{
            background-color: #EBEBEB;
            border: solid #E8E8E8;
            border-radius: 5px;
        }

        #formulario{
            margin-top: 15%;
            margin-bottom: 5%;
            padding-left: 8%;
            padding-right: 8%; 
        }

        #buttons_box{
            margin-bottom: 10%;
        }
            
    </style>

</head>
<body>

    <div class="container-fluid">
        <div id="container_add_obra" class="align-self-center col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-12 ">
                       
            <div id="cadastro_box" class="row">

                    <div id="bienvenido" class="d-flex justify-content-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2>Digite as informações</h2>
                    </div>  
                    <form action="{{URL::to('/salvarObra')}}" method="post" id="formulario" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nome" value="{{old('nome')}}" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" name="resumo" value="{{old('resumo')}}" placeholder="Resumo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="editora"  placeholder="Editora">
                        </div>
                        <div class="form-group">
                            <input type="number" min="1" class="form-control" id="formGroupExampleInput2" name="num_exemplares"  placeholder="Número de exemplares">
                        </div>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div id="buttons_box" >
                            <button type="submit" id="botao_confirmarCadastro" class="btn btn-primary btn-lg btn-sm">Pronto!</button>
                            <button type="reset"  id="botao_cancelarCadastro" class="btn btn-danger btn-lg btn-sm">Cancelar</button>
                        </div>    
                    </form>
            </div>

            @if( isset($errors) && count($errors) > 0 )
                <div class=" alert alert-danger">
                    @foreach ( $errors->all() as $error )
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif     
        </div>
    </div>


</body>
</html>