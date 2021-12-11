<?php
$dezAnos = 10*365*24*60*60;
session_start();
if(!isset($_COOKIE['QuantidadeLivrosCadastrados'])){ // Se não existe o Cookie quantidade de livros cria o cookie
    setcookie('QuantidadeLivrosCadastrados',0,time()+$dezAnos);
}

if(!file_exists('Livros.txt')){ //Se não existe o arquivo txt cria novo arquivo
    $arquivo = fopen("Livros.txt", 'w');
    fclose($arquivo);
}
    function Nome(){
        return $_SESSION['Nome'];
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sistema Bibliotecário</h1>
    <form action="Pesquisa.php" method="POST">
        <input type="text" name="NomePesquisado">
        <input type="submit" name="botao" value="Pesquisar">
    </form>
    <p>Olá <?php echo Nome();?></p>
    <form action="AdicionarLivro.php" method="POST">
        <input type="submit" name= "botaoAdicionarLivro" value="Adicionar um livro">
    </form>
    <form action="Logout.php" method="POST">
        <input type="submit" name= "botaoLogout" value="Logout">
    </form>
</body>
</html>