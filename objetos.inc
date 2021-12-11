<?php
    class Obra {
        private string $nome;
        private string $autor;
        private string $editora;
        private string $resumo;
        private string $quantidade;
        private string $dataCadastro;
        private string $dataEdicao;

        function __construct($nome, $autor, $editora, $resumo, $quantidade, $dataCadastro){
            $this->nome = $nome;
            $this->autor = $autor;
            $this->editora = $editora;
            $this->resumo = $resumo;
            $this->quantidade = $quantidade;
            $this->dataCadastro = $dataCadastro;
        }

        function echoObra(){
            echo "<li><div class='qtd'>$this->quantidade</div>
            <div class='nome-livro'>$this->nome</div>
            <div class='spec'>$this->autor | $this->editora</div>
            <div class='data-cadastro'>$this->dataCadastro</div>
            <div class='resumo'>$this->resumo</div></li>";
        }

        function getNome(){return $this->nome;}
        function getAutor(){return $this->autor;}
        function getEditora(){return $this->editora;}
    }

    class Acervo {
        private $livros = array();

        function pushObra($obra){
            array_push($this->livros, $obra);
        }

        function getObra($indice){
            return $this->livros[$indice];
        }

        function getObras(){
            return $this->livros;
        }

        function findObras($entrada){
            $lista = new Acervo();
            foreach ($this->livros as $livro){
                if (stristr($livro->getNome(),$entrada) || stristr($livro->getAutor(),$entrada) || stristr($livro->getEditora(),$entrada)){
                    $lista->pushObra($livro);
                }
            }
            return $lista;
        }
    }
?>