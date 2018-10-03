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

    </style>
</head>
<body>
    
    <div class="container-fluid">
        @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.scripts')
</body>
</html>