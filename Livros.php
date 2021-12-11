<?php 
    class Livros{
        var $titulo;
        var $autor;
        var $editora;
        var $sinopse;
        var $numExemplares;
        var $dataLancamento;
        var $genero;
    
        
        function __construct($titulo, $autor, $editora, $sinopse, $numExemplares, $dataLancamento, $genero){
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->editora = $editora;
            $this->sinopse = $sinopse;
            $this->numExemplares = $numExemplares;
            $this->dataLancamento = $dataLancamento;
            $this->genero = $genero;
        }
        
        function salvaLivro(){
            if(filesize("livros.json") == 0){
                $firstRecord = array($this);
    
                $saveData = $firstRecord;
            } else{
                $oldRecords = json_decode(file_get_contents("livros.json"));
                
                array_push($oldRecords, $this);
    
                $saveData = $oldRecords;
            }
    
            if(!file_put_contents("livros.json", json_encode($saveData,JSON_PRETTY_PRINT), LOCK_EX)){
                $error = "Errro ao Cadastrar Livro, por favor tente novamente!";
            } else{
                $sucess = "Livro Cadastrado com Sucesso!";
                header ("location: http://localhost/SistemaBibliotecário/index.php"); 
            }
        }
        
    }
    
?>