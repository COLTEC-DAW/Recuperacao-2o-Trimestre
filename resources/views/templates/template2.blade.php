<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Página</title>

    <!-- Estilização -->
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

        #box{
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

        /*Botão Logout*/
            
        #logoutButton{
            color:white;
            border-radius:3px;
            border: solid white;
            background-color:#343a40;
        }
        #logoutButton:hover{
            color:#343a40;
            background-color:white;
            transition: 0.3s;
        } 

    </style>
</head>
<body>
    
    <div class="container-fluid">
        @yield('content')
    </div>
    @include('includes.scripts')
</body>
</html>