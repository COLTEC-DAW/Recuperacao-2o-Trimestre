<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pesquisa</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><h5><b>MyReads COLTEC</b></h5></a>
        <ul class="navbar-nav mr-auto "></ul>   
        
        <div class="search-container">
            <form action="{{URL::to('/pesquisar')}}">
                <input type="text" placeholder="Buscar obras por nome, autor e editora" name="busca">
                <button id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
        <h5 id="titleuser">Bom dia!</h5>
        <a href="/sair" class="btn btn-outline-success" type="button">Log Out</a>
    </nav>

                
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu Principal</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Funcionalidades</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Adicionar</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/adicionarObra">Adicionar Obra</a>
                        </li>
                    </ul>
                </li>                
                <li>
                    <a href="/sair">Sair</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">                  
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <span>Menu</span>
                    </button>
                </div>
            </nav>
        </div>

    <div class="container-fluid">
        <h1>Resultados da Pesquisa</h1>

        @foreach($respostas as $resposta)
        <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$resposta->nome}}</h5>
                    <small>{{$resposta->created_at}}</small>
                </div>
                <small>Autor:{{$resposta->autor}}</small>
                <p class="mb-1">{{$resposta->resumo}}</p>
                <small>Editora: {{$resposta->editora}}</small>
            </a>
        </div>
        <br/>
        @endforeach
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
    
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
    
    $('div.alert').delay(5000).slideUp(300);
    </script>

</body>
</html>
