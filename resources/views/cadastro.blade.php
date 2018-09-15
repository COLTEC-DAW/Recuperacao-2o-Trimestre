<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastro de Usuário</title>

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
            border-radius: 3px;
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
        <div id="container_login" class="align-self-center col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-12 ">
            <div id="cadastro_box" class="row">
                           
                <div id="formulario" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" name="login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="formGroupExampleInput2" name="senha" placeholder="Senha">
                        </div>
                    </form>
                </div>
                <div id="buttons_box" class="col-xl-6  offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12">
                    <button type="submit" id="botao_confirmarCadastro" class="btn btn-primary btn-lg btn-sm">Pronto!</button>
                    <button type="submit" id="botao_cancelarCadastro" class="btn btn-danger btn-lg btn-sm">Cancelar</button>
                </div>        
            </div>     
        </div>
    </div>

</body>
</html>