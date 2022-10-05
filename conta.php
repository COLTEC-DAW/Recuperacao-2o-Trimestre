<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: login.php");
        exit();
    }

    if(!isset($_GET['logout'])){
        unset($_SESSION['user']);
        header("location: login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta do usuário</title>
</head>
<body>
    
    <div>

        <header>
            <h2>Welcome <?php echo $_SESSION['user']; ?></h2>
            <a href="?logout">Log out</a>
        </header>


        <main>
            <h3>Some</h3>
        </main>
    </div>

</body>
</html>