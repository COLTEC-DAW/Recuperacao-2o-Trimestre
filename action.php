<?php 
    include "livros.php";
    if(isset($_POST['submit'])){
        $novoLivro = new Livros ( $_POST['nomeObra'], $_POST['nomeAutor'], $_POST['nomeEditora'], $_POST['sinopseLivro'], $_POST['numeroExemplares'], $_POST['dataLancamento'], $_POST['generoObra']);

        if(filesize("livros.json") == 0){
            $firstRecord = array($novoLivro);

            $saveData = $firstRecord;
        } else{
            $oldRecords = json_decode(file_get_contents("livros.json"));
            
            array_push($oldRecords, $novoLivro);

            $saveData = $oldRecords;
        }

        if(!file_put_contents("livros.json", json_encode($saveData,JSON_PRETTY_PRINT), LOCK_EX)){
            $error = "Errro ao Cadastrar Livro, por favor tente novamente!";
        } else{
            $sucess = "Livro Cadastrado com Sucesso!";
            header ("location: http://localhost/SistemaBibliotecário/index.php"); 
        }
    }
?>