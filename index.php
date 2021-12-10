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
    <div class="container mt-3 mb-3">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
                $jsonData = file_get_contents("livros.json");
                $livros = json_decode($jsonData,true);
                if (count($livros) > 0){
                    foreach ($livros as $livro){
                    ?>  
                        
                        <div class="col">
                            <div class="card h-100">
                            <div class="card-header"><?php echo $livro['autor'] ?> - <?php echo $livro['editora'] ?></div>
                                <img src="./images/screen-7.jpg" class="card-img-top" alt="...">  
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
</body>
</html>