<?php 
class Livro{
        private $nome;
        private $resumo ;
        private $autor;
        private $editora;
        private $exemplares;
        private $data;
        public function getNome()
        {
            return $this->nome;
        }
        
        public function getResumo()
        {
            return $this->resumo;
        }    
        
        public function getAutor()
        {
            return $this->autor;
        }
        
        public function getEditora()
        {
            return $this->editora;
        }
        
        public function getExemplares()
        {
            return $this->exemplares;
        }
        
        public function getData()
        {
            return $this->data;
        }
        
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setResumo($resumo){
            $this->resumo = $resumo;
        }
        public function setAutor($autor){
            $this->autor = $autor;
        }
        public function setEditora($editora){
            $this->editora = $editora;
        }
        public function setExemplares($exemplares){
            $this->exemplares = $exemplares;
        }

        public function setData($data){
            $this->data = $data;
        }
}
?>
    