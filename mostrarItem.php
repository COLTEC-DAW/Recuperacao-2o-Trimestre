<?php require("login.class.php") ?>
<?php require("busca.class.php") ?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
   
   session_start();
   $users = @json_decode(file_get_contents('users.json'), true);
  
?>
<?php
   if(isset($_POST['submit'])){
    $_SESSION['user'];
    $pesquisar = new Pesquisar('user', $_POST['pesquisa']);
   }
?>


<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITENS</title>
      <div class = "content"></div>
       <h2> welcome 
       <?php 
           echo $_SESSION['user'];
        ?>
       </form>

       </head>

       <body>
       <table cellpadding="10" cellspacing="0" width="1" >
    
    
    <form  action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    <h3>Pesquisar atributo</h1>
        <input class="preencher" type="text" name="pesquisa">
        <br/><br/>
        <button class="butaoLog" type="submit" name="submit">PESQUISAR</button>
        <br/><br/>
        <tr>
   

    </form>
     <?php foreach ($users as $user): ?>
       <tr>
       
           <td><?php 
           
           echo ($user['alternativas']); 
           
           ?></td>
           
       </tr>
       
   <?php endforeach ?>
          
     <p class="error"><?php echo @$user->error ?></p>
     <p class="success"><?php echo @$user->success ?></p>
 
</table>
       </body>
 
 
</html>