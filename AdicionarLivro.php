
<?php
    $dezAnos = 10*365*24*60*60;

    if(isset($_POST['DadosCatalogados'])){ //Se os dados do novo livro já foram catalogados
        $arquivo = fopen("Livros.txt", 'a');
        //Escreve os dados no arquivo
        fwrite($arquivo,$_POST['NomeLivroNew'].'\#'.$_POST['ResumoDaObraNew'].'\#'.$_POST['NomeAutorNew'].'\#'.$_POST['NomeEditoraNew'].'\#'.$_POST['ExemplaresObraNew'].'\#'.$_POST['DataLivroNew'].'\#');
        $novaQuantidadeLivros = intval($_COOKIE['QuantidadeLivrosCadastrados'])+1; 
        setcookie('QuantidadeLivrosCadastrados',$novaQuantidadeLivros,time()+$dezAnos); //Aumenta em 1 a quantidade de livros já salvos
        fclose($arquivo);
        unset($_POST['DadosCatalogados']);
        header('Location: Menu.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdicionarLivro</title>
</head>
<body>
    <div>
        <form action="AdicionarLivro.php" method="post">
            <p>Qual o nome do seu Livro?</p>
            <input type="text" name="NomeLivroNew">
            <p>Dê um pequeno resumo da obra:</p>
            <input type="text" name="ResumoDaObraNew">
            <p>Qual o nome da editora da obra?</p>
            <input type="text" name="NomeEditoraNew">
            <p>Qual o nome do autor da obra?</p>
            <input type="text" name="NomeAutorNew">
            <p>Quantos exemplares da obra foram publicados?</p>
            <input type="text" name="ExemplaresObraNew">
            <p>Qual a data que o livro foi lançado?</p>
            <input type="date" name="DataLivroNew">
            <input type="submit" name="botao">
            <input type="hidden" name="DadosCatalogados">
        </form>
    </div>
</body>
</html>