
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
        </div>
    </div>

</body>
</html>