<?php 

class Questions
{

    private $questions = [
        "Nome do livro ou filme que deseja inserir em sua lista",
        "Selecione o gênero do livro ou filme",
        "Personagem Favorito",
        "Avaliação de 0 a 10",
        "Comentário"
    ];
    

    public function load_question($id){
        if($id <= 4){
        return $this->questions[$id];
        }else{
            header("Location: index.php");
        }
    }
    
}



?>

