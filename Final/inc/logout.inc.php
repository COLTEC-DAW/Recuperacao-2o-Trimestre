<?php
session_start();
    require "./logger.inc.php";
    $file_log = "./../json/logAtividades.json";
    $registro = 'Logout: '. $_SESSION["user"]["userName"];
    atualizaLog_Logout($registro, $file_log);

    session_destroy();
    header("Location: ./../index.php");
    exit;
?>