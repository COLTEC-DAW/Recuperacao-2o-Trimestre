<?php
session_start();

    $file_user = "./../json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)) {
        $old_file = json_decode(file_get_contents($file_user), true);
    }
    $mod_file = [];

    for ( $i= 1 ; $i <= 3 ; $i++ )
    {
        foreach ($old_file as $j) 
        {
            if ($j["prioridade"] == $i)
            {
                $aux = array(
                    "titulo" => $j["titulo"],
                    "prioridade" => $j["prioridade"],
                    "data" => $j["data"],
                    "descricao" => $j["descricao"]
                );
                    
                $mod_file[] = $aux;
            }
        }
    }

    // Limpa arquivo para reescrever
    $fp = fopen($file_user, "r+");
    ftruncate($fp, 0);
    fclose($fp);

    file_put_contents($file_user, json_encode($mod_file, JSON_PRETTY_PRINT));
    header("Location: ./../index.php");
?>