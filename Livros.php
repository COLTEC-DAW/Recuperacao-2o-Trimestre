<?php 
    include "dataLivros.inc";

    class Livros{
        var $titulo;
        var $autor;
        var $editora;
        var $sinopse;
        var $numExemplares;
        var $dataLancamento;
        var $genero;
    
        
        function __construct($titulo, $autor, $editora, $sinope, $numExemplares, $dataLancamento, $genero){
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->editora = $editora;
            $this->numExemplares = $numExemplares;
            $this->dataLancamento = $dataLancamento;
            $this->genero = $genero;
        }

        
    }
    
?>