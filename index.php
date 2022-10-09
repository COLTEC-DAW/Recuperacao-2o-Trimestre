<?php
   
   session_start();
   if(isset($_POST['submit'])){
    header("location: login.php"); exit();
    unset($_SESSION['user']);
    header("location: login.php"); exit();
   }


?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>user account</title>
      <div class = "content"></div>
       <h2> Welcome 
           <?php 
           echo $_SESSION['user'];
           ?>
           <br>
           <a href="pergunta.php?id=0">Cadastro de Item</a>
           </br>
           <br>
           <a href="mostrarItem.php">Mostrar Item</a>
            </br>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
           <br> <button class="butaoLog" type="submit" name="submit">Log out</button>
           <button type="submit" name="submit">
            <a href="paginaInicial.php">Voltar</a>
        </button>
</form>


    </head>
    
        




</html>