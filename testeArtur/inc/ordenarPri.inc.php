<?php
session_start();
    require "./objetificador.inc.php";
    $objarray = gerarObjArray();
    foreach ($objarray as $j) 
    {
        echo "j";
    }

    $tmp_list  = [];
    $file_name = "./../json/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_name)) {
        $tmp_list = json_decode(file_get_contents($file_name), true);
    }
    echo "k";

    // Limpa arquivo para reescrever
    $fp = fopen($file_name, "r+");
    ftruncate($fp, 0);
    fclose($fp);

    /*
    for ( $i= 1 ; $i <= 3 ; $i++ )
    {
        echo "in ";
        */
    foreach ($objarray as $j) 
    {
        echo "each ";
        echo gettype($j->prioridade);
        if ($j->prioridade == $i)
        {
            echo "if  ";
            $aux = array(
                "titulo" => $j->titulo,
                "prioridade" => $j->prioridade,
                "data" => $j->data,
                "descricao" => $j->descricao
            );
                
            $tmp_list[] = $aux;
        }
    }

    file_put_contents($file_name, json_encode($tmp_list, JSON_PRETTY_PRINT));
    //header("Location: ./../index.php");
?>
<!--
[ {
        "titulo": "DOG",
        "prioridade": "1",
        "data": "25.10.2023",
        "descricao": "xoimcasoimaoim "
    },
    {
        "titulo": "Arrouba",
        "prioridade": "2",
        "data": "25.10.2023",
        "descricao": "asdjomaoqim "
    },
    {
        "titulo": "PAPAGAIO",
        "prioridade": "2",
        "data": "25.10.2023",
        "descricao": "scnasoicn "
    },
    {
        "titulo": "GUA",
        "prioridade": "1",
        "data": "25.10.2023",
        "descricao": "djnaco\u00e7n "
    },
    {
        "titulo": "RYU",
        "prioridade": "3",
        "data": "25.10.2023",
        "descricao": "saocnoacno "
    },
    {
        "titulo": "VIN",
        "prioridade": "2",
        "data": "25.10.2023",
        "descricao": "osqndmioqwnmoqwin "
    }
]
-->