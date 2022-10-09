<?php
class RegisterAnswer{
   // class properties.
   private $answer;
    
   public $error;
   public $success;
   private $storage = "users.json";
   private $stored_respostas; // array
   private $new_respostas; // array
   public function __construct($answer){
    $this->answer = filter_var(trim($answer), FILTER_SANITIZE_STRING);
    $this->stored_respostas = json_decode(file_get_contents($this->storage), true);
    $this->new_respostas = [
        "alternativas" => $this->answer,
       
    ];

    if($this->checkFieldValues()){
        $this->insertUser();
 }
        
    }
    private function checkFieldValues(){
        if(empty($this->answer)){
           $this->error = "Both fields are required.";
           return false;
        }else{
           return true;
        }
     }
    private function insertUser(){
        array_push($this->stored_respostas, $this->new_respostas);
            if(file_put_contents($this->storage, json_encode($this->stored_respostas))){
              return $this->success = "Your registration was successful";
           }else{
              return $this->error = "Something went wrong, please try again";
           }
     }
}