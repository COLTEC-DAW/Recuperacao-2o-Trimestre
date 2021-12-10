<?php
    include '../pages/rodape.inc';
    include '../pages/cabecalho.inc';
    session_start(); 
?>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php 
    class book{

        public $NomeObra;
        public $ResumoObra;
        public $NomeAutor;
        public $NomeEditora;
        public $NumExemplares;
        public $DataCadastro;
        public $AdicionadoPor;

        public function __construct($nomeObra, $nomeAutor, $nomeEditora, $resumoObra, $numExemplares){

            date_default_timezone_set('America/Sao_Paulo');

            $this->NomeObra = $nomeObra;
            $this->NomeAutor = $nomeAutor;
            $this->NomeEditora = $nomeEditora;
            $this->ResumoObra = $resumoObra;
            $this->NumExemplares = $numExemplares;
            $this->DataCadastro = date('d/m/Y H:i');
            $this->AdicionadoPor = $_SESSION["username"];
        }

        function PostLivro(){
            $FileJson = file_get_contents('../repository/Livros.json', true);
            $decode = json_decode($FileJson, true);

            $newLivro = array(
                "NomeObra" => $this->NomeObra,
                "NomeAutor" => $this->NomeAutor,
                "NomeEditora" => $this->NomeEditora,
                "ResumoObra" => $this->ResumoObra,
                "NumExemplares" => $this->NumExemplares,
                "DataCadastro" => $this->DataCadastro,
                "AdicionadoPor" => $this->AdicionadoPor,
            );

            $decode[] = $newLivro;
            
            $FileJson = json_encode($decode, JSON_PRETTY_PRINT);
            file_put_contents("../repository/Livros.json", $FileJson);
        }
    }

    if(isset($_POST["NomeObra"]) && isset($_POST["NomeAutor"]) && isset($_POST["NomeEditora"])
        && isset($_POST["ResumoObra"]) && isset($_POST["NumExemplares"])  && isset($_SESSION["username"]))
    {
        $novoLivro = new book($_POST["NomeObra"], $_POST["NomeAutor"], $_POST["NomeEditora"], $_POST["ResumoObra"], $_POST["NumExemplares"], $_SESSION["username"]);

        $novoLivro->PostLivro();
    }
  
    
    echo exibeCabecalho();
    echo '
    <div style="margin-bottom: 427px!important">
    <a href="/index.php">voltar</a>
    </div>
    ';
    echo exibeRodape();
?>

