<?php
    class book{

        public $NomeObra;
        public $ResumoObra;
        public $NomeAutor;
        public $NomeEditora;
        public $NumExemplares;
        public $DataCadastro;

        public function __construct($nomeObra, $nomeAutor, $nomeEditora, $resumoObra, $numExemplares){

            $this->NomeObra = $nomeObra;
            $this->NomeAutor = $nomeAutor;
            $this->NomeEditora = $nomeEditora;
            $this->ResumoObra = $resumoObra;
            $this->NumExemplares = $numExemplares;
            $this->DataCadastro = date('d/m/Y H:i');
        }

        function PostLivro(){
            $FileJson = file_get_contents('./src/repository/Livros.json', true);
            $decode = json_decode($FileJson, true);

            $newLivro = array(
                "NomeObra" => $this->NomeObra,
                "NomeAutor" => $this->NomeAutor,
                "NomeEditora" => $this->NomeEditora,
                "ResumoObra" => $this->ResumoObra,
                "NumExemplares" => $this->NumExemplares,
                "DataCadastro" => $this->DataCadastro,
            );

            $decode[] = $newLivro;
            
            $FileJson = json_encode($decode, JSON_PRETTY_PRINT);
            file_put_contents("./src/repository/Livros.json", $FileJson);
        }
    }
    
?>