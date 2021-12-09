<?php
session_start();
if (empty($_POST)) {
    if (isset($_SESSION['name']) == true) {
        header('location: Biblioteca.php');
    } else {
        header('location: login.php');
    }
} else {
    if (isset($_POST)) {
        $_SESSION['name'] = $_POST['usuario'];
        header("Location: Biblioteca.php");
    }
}