<?php require("perguntas.class.php");
 require("register.class.php");
 require("respostas.class.php");
 
 if(isset($_POST['submit'])){
    $resposta = new RegisterAnswer($_POST['answer']);
 }
  $question_id = 0;


$question = new Questions;
$pergunta = $question->load_question($question_id);


if (isset($_GET["id"])) {
    $question_id = $_GET["id"];
}


$question = new Questions;
$pergunta = $question->load_question($question_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Log in form</title>
</head>
<body>
<div class="central">
    <h2><?= $pergunta ?></h2> 
    <form action="pergunta.php?id=<?= $question_id + 1 ?>" method="post">
            <input type="text" name="answer" placeholder="digite aqui">
            <button class="butaoLog" type="submit" name="submit" value="Enviar">Enviar</button>
        </form>
</div>
</body>
</html>