
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>

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

        #login_box{
            background-color: #EBEBEB;
            border: solid #E8E8E8;
            border-radius: 5px;
        }

        #formulario{
            margin-top: 10%;
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
            <div id="login_box" class="row">
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
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script>
         $('div.alert').delay(5000).slideUp(300);
    </script>

</body>
</html>