
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MyReds COLTEC</title>

    <style>
    
        body{
            background: #3B7F78;
            overflow: hidden;
        }

        #bienvenido{
            min-height: 100%;
            display: flex;
            align-items: center;
            font-family: 'Roboto Condensed', sans-serif;
            color: whitesmoke;
            font-size: 400%;   
        }

        #box{
            min-height: 100%;
            display: flex;
            align-items: center;
            background-color: #234C48;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        #box:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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

    /*Footer*/

        #footer{
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 130%;
            background-color: #C1C1C7;
            padding-bottom: 30px;
            position:fixed;
            bottom:0;
            width:100%;
            padding: 10;
            vertical-align: middle;
        }
        #logoFooter{
            height: 60px;
            width: 80px;
        }
        #container_contentFooter{
            padding-right: 48px;
            padding-left: 0px;
            color: #59595C;
        }
    
        #registrar{
            text-decoration: none;
            text-align:right;
            color: white;
        }
    </style>

</head>
<body>
    <div id="container_login" class="row">
        <div id="bienvenido" class="container-fluid col-sm-8 col-md-8 col-lg-8">
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
                
                @if( isset($errors) && count($errors) > 0 )
                    <div class=" alert alert-danger">
                        @foreach ( $errors->all() as $error )
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif  
            <p>
                MyReads, a biblioteca compartilhada perfeita pra você.
            </p>  
        </div>
        <div id="box" class="container-fluid col-sm-4 col-md-4 col-lg-4">

            <form action="{{URL::to('/confereLogin')}}" method="post">
                <div class="form-group">   
                    <input type="text" class="form-control" name="login" value="{{old('login')}}" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                
                <button type="submit" value="confirmar" class="btn btn-primary">Entrar</button>
            </form>
            <a id="registrar" href="{{URL::to('/registrar')}}">Registrar</a>
        </div>
    </div>
    @include('includes.footer')
    @include('includes.scripts')
</body>
</html>
