<?php
    include './src/library/createBook.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/index.css">

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
                    <a class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" style="margin-right: 785px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                        </svg>
                    </a>
                    <div class="text-end">
                        <form action="" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <input type="search" class="form-control-dark" placeholder="Search..." aria-label="Search">
                            <input type="submit" class="btn btn-outline-light me-2" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="container px-4 py-5">
            
            <h2 class="pb-2 border-bottom">Livros
                <button class="btn btn-outline-dark me-2" style="margin-left: 940px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="material-icons-outlined">
                        add
                    </span>
                </button>
            </h2>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                <table id="TableHome">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Resumo</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Numero exemplares</th>
                            <th>Data cadastro</th>
                        </tr>
                    </thead>
                    <tbody id="LivrosContainerHome">
                        
                    </tbody>
                </table>
            </div>
        </div>


        <footer class="py-3 my-4 bg-dark text-white">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar novo livro</h5>
                <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./src/library/createBook.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="NomeObra" name="NomeObra" placeholder="terra dos coquinhos">
                        <label for="NomeObra">Nome da Obra</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ResumoObra" name="ResumoObra" placeholder="muitos coquinhos">
                        <label for="ResumoObra">Resumo da Obra</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="NomeAutor" name="NomeAutor" placeholder="coquinho">
                        <label for="NomeAutor">Autor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="NomeEditora" name="NomeEditora" placeholder="coquinhosGrandes">
                        <label for="NomeEditora">Editora</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="NumExemplares" name="NumExemplares" placeholder="coquinhosGrandes">
                        <label for="NumExemplares">Numero de exemplares</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-outline-success" value="Salvar"></input>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Script Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Data Tables  -->
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Funções para gerar tabelas -->
    <script src="./assets/scripts/table.js"></script>

    <script>



    </script>
</body>
</html>