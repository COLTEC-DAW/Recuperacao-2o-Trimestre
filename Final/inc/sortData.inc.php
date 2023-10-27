<?php
session_start();

    $file_user = "./../json/users/".$_SESSION["user"]["userName"] . ".json";

    if (file_exists($file_user)) {
        $old_file = json_decode(file_get_contents($file_user), true);
    }

    $array_data = [];
    foreach ($old_file as $j) 
    {
        if (count($array_data) > 0)
        {
            $tmp = 0;
            foreach ($array_data as $k)
            {
                if (strcmp( $k, date("Y:m:d", strtotime($j["data"])) ) != 0)
                {
                    $tmp ++;
                }
            }

            // significa que não teve data repetida
            if ($tmp == count($array_data)) 
            {
                $array_data[] = date("Y:m:d", strtotime($j["data"]));
            }
        }

        else 
        {
            $array_data[] = date("Y:m:d", strtotime($j["data"]));
        }
    }

    sort($array_data);

    $mod_file = [];

    foreach ($array_data as $k)
    {
        foreach ($old_file as $j) 
        {
            if (strcmp( $k, date("Y:m:d", strtotime($j["data"])) ) == 0)
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