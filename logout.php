<?php
    session_start();
    $ultimoLogin = date('d/m/Y | H:i:s');
    setcookie($_SESSION["user"]."-lastLogin", $ultimoLogin);
    session_destroy();
    header("Location: index.php");
?>