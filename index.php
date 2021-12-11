<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Biblioteca</title>
</head>
<body>
    <div class="container-fluid px-0">
        <nav class="navbar navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/SistemaBibliotec%C3%A1rio/index.php">Biblioteca Coltec</a>
                <div class="d-flex">
                    <a href="http://localhost/SistemaBibliotec%C3%A1rio/cadastroLivro.html"><button class="btn btn-primary me-3 d-inline">Cadastrar</button></a>
                    <input class="form-control me-2" id="searchInput" type="Pesquisar" placeholder="Pesquisar" name="pesquisar" aria-label="Pesquisar" onkeyup="buttonUp();">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mb-3">
        <?php 
            if(!empty($_COOKIE["message"])){
                $alerta = $_COOKIE["message"];
                echo "<div class='alert alert-success' role='alert'>$alerta</div>";
                setcookie("message", "", time()-3600);
            }
        ?>
        <p class="d-none" id="divResultado">Resultados Encontrados: <span id="resultado"></span></p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
                $jsonData = file_get_contents("livros.json");
                $livros = json_decode($jsonData,true);
                if (count($livros) > 0){
                    foreach ($livros as $livro){
                    ?>  
                        
                        <div class="col card-box">
                            <div class="card h-100">
                            <div class="card-header"><?php echo $livro['autor'] ?> - <?php echo $livro['editora'] ?></div>
                                <img src="./images/saber.jpg" class="card-img-top" alt="...">  
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $livro['titulo'] ?></h5>
                                    <p class="card-text"><?php echo $livro['sinopse'] ?></p>
                                </div>
                                <div class="card-footer bg-transparent">Unidades Disponíveis - <?php echo $livro['numExemplares'] ?></div>     
                            </div>
                        </div>
                        
                    <?php 
                    }
                }
                ?>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/88b5d55d09.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="buscarLivro.js"></script>
</body>
</html>