<?php
class RegisterUser{
   // class properties.
   private $name;
   private $email;
   private $username;
   private $raw_password;
   private $encrypted_password;
   public $error;
   public $success;
   private $storage = "users.json";
   private $stored_users; // array
   private $new_user; // array
   private $listaDeDados;
   public function __construct($username, $password, $name, $email){
    $this->name = filter_var(trim($name), FILTER_SANITIZE_STRING);
    $this->email = filter_var(trim($email), FILTER_SANITIZE_STRING);
    $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
    $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
    $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $this->stored_users = json_decode(file_get_contents($this->storage), true);
    $this->new_user = [
        "name" => $this->name,
        "email" => $this->email,
        "username" => $this->username,
        "password" => $this->encrypted_password,
    ];
    if($this->checkFieldValues()){
        $this->insertUser();
 }
}

//vai validar se os campos de entrada de nome de usuário e senha não estão vazios.
 private function checkFieldValues(){
    if(empty($this->name) || empty($this->email) || empty($this->username) || empty($this->raw_password)){
       $this->error = "Both fields are required.";
       return false;
    }else{
       return true;
    }
 }

//gravará o usuário no arquivo JSON
 private function insertUser(){
  
       array_push($this->stored_users, $this->new_user);
       if(file_put_contents($this->storage, json_encode($this->stored_users))){
          return $this->success = "Your registration was successful";
       }else{
          return $this->error = "Something went wrong, please try again";
       }
    }
 }


?>