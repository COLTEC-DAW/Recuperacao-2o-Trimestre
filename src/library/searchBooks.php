<?php


    $FileJson = file_get_contents('../repository/Livros.json', true);
    $decode = json_decode($FileJson, true);
    $retorno = [];

    foreach($decode as $livro){
        if($livro["NomeObra"] == $_GET["procurado"] || $livro["NomeAutor"] == $_GET["procurado"] || $livro["NomeEditora"] == $_GET["procurado"]){
            array_push($retorno, $livro);
        }
    }

    if(count($retorno) > 0){
        $GLOBALS["livrosSearch"] = json_encode($retorno);
    }
    else{

        $GLOBALS["livrosSearch"] = json_encode([]);
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/css/index.css">

    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    
    <!-- Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Book Box</title>
</head>
<body>
    
    <div>

        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="../../index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" style="margin-right: 785px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </header>

        <div class="container px-4 py-5">
            
            <h2 class="pb-2 border-bottom">Resultados da sua pesquisa
                <a type="button" href="../../index.php" class="btn btn-outline-dark me-2" style="margin-left: 940px;">
                    <span class="material-icons-outlined">
                        arrow_back
                    </span>
                </a>
            </h2>
            
            <div class="row row-cols-12 row-cols-sm-12 row-cols-md-12 row-cols-lg-12 g-4 py-5">
                <table id="TableSearch">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Resumo</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Numero exemplares</th>
                            <th>Data cadastro</th>
                            <th>Adicionado Por:</th>
                        </tr>
                    </thead>
                    <tbody id="LivrosContainerSearch">
                        
                    </tbody>
                </table>
            </div>
        </div>


        <footer class="py-3 my-4 bg-dark text-white" style="margin-bottom: 0!important;">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="https://github.com/PedroHenAssuncao" class="nav-link px-2 text-muted">GitHub Pedro</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/ivonpr" class="nav-link px-2 text-muted">GitHub Ivo</a>
                </li>
            </ul>
            <p class="text-center text-muted">Developed with ❤️ by Pedro Henrique Assunção & Ivo Nascimento Pereira Rodrigues</p>
        </footer>
    </div>

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Script Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Data Tables  -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Funções para gerar tabelas -->
    <script src="../../assets/scripts/table.js"></script>

    <script>

        const UpdateTable = () => {  

            BuildTableSearch(JSON.parse(<?php echo json_encode($GLOBALS["livrosSearch"])?>));
        }

        UpdateTable();
    </script>
</body>
</html>