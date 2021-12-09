<?php
class Livro
{
    var $Nome;
    var $Resumo;
    var $Autor;
    var $Editora;
    var $NumExemplares;
    var $data;

    function __construct($nome, $resumo, $autor, $editora, $numExemplares, $data)
    {
        $this->Nome = $nome;
        $this->Resumo = $resumo;
        $this->Autor = $autor;
        $this->Editora = $editora;
        $this->NumExemplares = $numExemplares;
        $this->data = $data;
    }

    function formatarLivro()
    {
        $default_Inicio = "\t\t\t" . '<div class="col-3 livro">
        <div class="card h-100">
          <div class="card-body">';
        $default_Fim = "</div>
        </div>\n";

        $str = $default_Inicio . '<h5 class="card-title">' . $this->Nome . " - " . $this->Autor . "</h5>";
        $str = $str . '<p class="card-text">' . $this->Resumo . '</p>';
        $str = $str . '<div class="destaque"><div href="#" class=" button btn btn-warning fw-bold">
        Editora: ' . $this->Editora . "</div>";
        $str = $str . '<div href="#" class="button btn btn-warning fw-bold">
        Nº de exemplares: ' . $this->NumExemplares . "</div></div>";
        $str = $str . '</div> <div class="card-footer"> <small class="text-muted">' . "Data de cadastro: " . $this->data . '</small> </div>';
        $str = $str . $default_Fim;

        return $str;
    }

    function formatarJson()
    {
        $str = "{ \n";
        $str = $str . '"nome":' . '"' . $this->Nome . '", ' . "\n" . '';
        $str = $str . '"resumo":' . '"' . $this->Resumo . '", ' . "\n" . '';
        $str = $str . '"autor":' . '"' . $this->Autor . '", ' . "\n" . '';
        $str = $str . '"editora":' . '"' . $this->Editora . '", ' . "\n" . '';
        $str = $str . '"numExemplares":' . '"' . $this->NumExemplares . '", ' . "\n" . '';
        $str = $str . '"data":' . '"' . $this->data . '" ' . "\n" . ' },';
        return $str;
    }
}

function allBooks()
{
    $caminho = "./livros.json";
    $livrosJson = json_decode(file_get_contents($caminho), true);
    $livros = [];
    foreach ($livrosJson as $livro) {
        $livros[] = new Livro(
            $livro['nome'],
            $livro['resumo'],
            $livro['autor'],
            $livro['editora'],
            $livro['numExemplares'],
            $livro['data']
        );
    }
    return $livros;
}
function lastBooks()
{
    $livros = allBooks();
    if (count($livros) > 20) {
        return array_chunk(array_reverse($livros), 20);
    }
    return array_reverse($livros);
}

function transformArrayToString($livros)
{
    $str = "[ \n";
    foreach ($livros as $livro) {
        $str = $str . $livro->formatarJson();
    }
    $str = rtrim($str, ',');
    $str = $str . "]";
}


function addLivro(Livro $livro)
{
    if (
        ($livro->Nome != null && $livro->Nome != "") &&
        ($livro->Resumo != null && $livro->Resumo != "") &&
        ($livro->Autor != null && $livro->Autor != "") &&
        ($livro->Editora != null && $livro->Editora != "") &&
        ($livro->NumExemplares != null && $livro->NumExemplares != "") &&
        ($livro->data != null && $livro->data != "")
    ) {
        $caminho = "./livros.json";
        $str = file_get_contents($caminho);
        $str = rtrim($str, ']');
        $str = $str . "," . $livro->formatarJson();
        $str = rtrim($str, ',');
        $str = $str . " \n]";
        file_put_contents($caminho, $str);
    }
}

function pesquisaLivro($string)
{
    $livros = allBooks();
    $livrosSelecionados = [];
    foreach ($livros as $livro) {
        if (str_contains($livro->Nome, $string) || str_contains($livro->Autor, $string) || str_contains($livro->Editora, $string)) {
            array_push($livrosSelecionados, $livro);
        }
    }
    return $livrosSelecionados;
}

function imprimirLivros($livros)
{
    echo '<div class="livros col-10">';
    foreach ($livros as $livro) {
        echo $livro->formatarLivro();
    }
    echo "</div>";
}