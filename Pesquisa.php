<?php
    include_once 'Livro.php';

    session_start();
 //Se existe uma sessão
    if(!isset ($_SESSION['Nome']) ){
        header('Location: Cadastro.php');
    }else{

        if(!isset($_POST['NomePesquisado'])){ //Se não Veio da pagina Menu

            header('Location: Menu.php');
        }else{
            $Livro = new Livro();
            $posicaoDoItemProcurado; //Guarda a posição do item procurado
            $posicao; //Contador de posições
            $encontrado = false; //Guarda Se o Livro procurado foi encontrado
            $itensPorLivro = 6; //Guarda o numero de informações que temos por livro
            $quantidadeLivros = intval($_COOKIE['QuantidadeLivrosCadastrados']); //Guarda quantos livros já temos guardados
            $dados = array(); //Irá Guardar todos os dados do arquivo

            $pesquisa = strtoupper($_POST['NomePesquisado']); // Guarda a string da pesquisa
            $arquivo = fopen('Livros.txt', 'r'); //Abri o arquivo para leitura
            $dados = explode('\#',fgets($arquivo));//A função explode divide os dados do documento pela chave
            $dadosProcurados = array();//Guarda somente os dados do livro pesquisado
            fclose($arquivo);
            
            for($i = 0; $i < $quantidadeLivros; $i++){ //Faz para cada livro
                $posicao = $i*$itensPorLivro; //pula de livro em livro de acordo com a quantidade de dados
                $dadoPosicao = strtoupper($dados[$posicao]); //Guarda o nome da posição

                if($pesquisa == $dadoPosicao){ // se o nome pesquisado é igual ao nome da posição atual
                    $encontrado = true;
                    for($j = 0; $j < $itensPorLivro; $j++){ // copia os itens do livro da posição para o vetor dados procurados
                        $dadosProcurados[$j]  =  $dados[$j+$posicao];
                    }
                    break;
                }
            }

            if($encontrado ==  false){ // se a pesquisa foi encontrada
                header('Location: Menu.php');
            }else{ //Se não copia os dados
                $Livro->setNome($dadosProcurados[$itensPorLivro - $itensPorLivro]);
                $Livro->setResumo($dadosProcurados[$itensPorLivro - ($itensPorLivro-1)]);
                $Livro->setAutor($dadosProcurados[$itensPorLivro - ($itensPorLivro-2)]);
                $Livro->setEditora($dadosProcurados[$itensPorLivro - ($itensPorLivro-3)]);
                $Livro->setExemplares($dadosProcurados[$itensPorLivro - ($itensPorLivro-4)]);
                $Livro->setData($dadosProcurados[$itensPorLivro - ($itensPorLivro-5)]);   
            }
        }
    }


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $Livro->getNome();?></h1>
    <h2>Resumo</h2>
    <?php echo $Livro->getResumo();?><br>
    <nobr> Autor: <?php echo $Livro->getAutor();?></nobr><br>
    <nobr> Nome Editora: <?php echo $Livro->getEditora();?></nobr><br>
    <nobr> N° Exemplares: <?php echo $Livro->getExemplares();?></nobr><br>
    <nobr> Data: <?php echo $Livro->getData();?></nobr><br>

    <form action="Menu.php" method="POST">
        <input type="submit" value="Voltar">
    </form>
</body>
</html>