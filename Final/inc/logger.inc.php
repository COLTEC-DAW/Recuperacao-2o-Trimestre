<?php
// Atualiza log de atividades 
function atualizaLog($registro)
{
    $file_log  = "./json/logAtividades.json";

    $tmp = json_decode(file_get_contents($file_log), true);
    $aux = array
    (
        "Usuario" => $_SESSION["user"]["userName"],
        "E-mail" => $_SESSION["user"]["email"],
        "Data" => date("d.m.Y, H:i"),
        "Registro" => $registro,
    );
    $tmp[] = $aux;

    file_put_contents($file_log, json_encode($tmp, JSON_PRETTY_PRINT));
}
function atualizaLog_Logout($registro, $file_log)
{
    $tmp = json_decode(file_get_contents($file_log), true);
    $aux = array
    (
        "Usuario" => $_SESSION["user"]["userName"],
        "E-mail" => $_SESSION["user"]["email"],
        "Data" => date("d.m.Y, H:i"),
        "Registro" => $registro,
    );
    $tmp[] = $aux;

    file_put_contents($file_log, json_encode($tmp, JSON_PRETTY_PRINT));
}
?>