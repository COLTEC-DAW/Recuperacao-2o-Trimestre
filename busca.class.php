<?php
class Pesquisar{
   // class properties --------------------------------------
   private $storage = "users.json";
   private $stored_users; 
   private $pesquisas = array();

   // class methods -----------------------------------------
   //constroi a classe
   public function __construct($user,$pesquisa){
     $this->pesquisas = $pesquisa;
     $this->stored_users = json_decode(file_get_contents($this->storage), true);
     $this->busca($user);
   }
 
   //faz o login
   private function busca($user){
    foreach ($this->stored_users as $user) {
        if($user['alternativas'] == $this->pesquisas){
            echo $this->pesquisas;
         }
     }
      return $this->error = "Not found";
   }
} 

