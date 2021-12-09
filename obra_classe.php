<?php

    class obra{
        private $nome;
        private $resumo;
        private $nome_autor;
        private $nome_editora;
        private $num_exemplares;
        private $data;
        
        public function __construct($nome, $resumo, $nome_autor, $nome_editora, $num_exemplares, $data){
            $this->nome = $nome;
            $this->resumo = $resumo;
            $this->nome_autor = $nome_autor;
            $this->nome_editora = $nome_editora;
            $this->num_exemplares = $num_exemplares;
            $this->data = $data;
        }

        public function GetNome(){
            return $this->nome;
        }

        public function GetResumo(){
            return $this->resumo;
        }

        public function GetNome_autor(){
            return $this->nome_autor;
        }

        public function GetNome_editora(){
            return $this->nome_editora;
        }

        public function GetNum_exemplares(){
            return $this->num_exemplares;
        }

        public function GetData(){
            return $this->data;
        }
    }

?>