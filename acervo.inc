<?php
    $acervo = new Acervo();
    $arquivo = fopen("./livros.txt", "r+t");
    while(!feof($arquivo)){
        $linha = fgets($arquivo);
        if ($linha != ''){
            $dados = explode('|', $linha);
            $acervo->pushObra(new Obra($dados[0],$dados[1],$dados[2],$dados[3],$dados[4],$dados[5]));
        }
    }
    fclose($arquivo);
?>