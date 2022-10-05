<!-- escrever a classe login -->

<?php

class RegistrarUsuario{
    /// propriedades da classe
    private $username;
    private $raw_password;
    private $encrypted_password;
    public $error;
    public $success;
    // error e success são publicas pq precisam ser acessadas pelo form de login
    private $storage = "usuarios.json";  // guarda o arquivo json
    private $stored_users;  // guarda todos os usuarios no arquivo
    private $new_user; // array, guarda os dados do novo user (nome e senha criptografada)


    /// métodos da classe e construtor
    // construtor: inicializa as propriedades
    public function __construct($username, $password){
        // this->username: variavel global, $username: parametro
        $this->username = trim($this->username);  // trim espaços na ponta do nome do user antes de assinalar o valor ao nome
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);  // faz uma limpeza no valor do user: remove caracteres ilegais
        // FILTER_SANITIZE_STRING: varios tipos de filter podem ser usados como parametros, o escolhido foi esse, que lida com string

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);  // trim e sanitize a senha numa linha só
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);  // encripta a senha
        // PASSWORD_DEFAULT: usa o metodo mais recente de encriptação e encriptar a senha

        $this->stored_users = json_decode(file_get_contents($this->storage), true);  // acessa os usuarios armazenados no json e guarda eles em stored_users
        // json_decode: pega uma string json e a converte numa variavel php, (string q vai ser decoded, boolean)
        // file_get_contents: pega o caminho de um arquivo como argumento
        // argumento true: converte os dados em um array, se for false retorna um objeto (false é default)

        // assinala um array com nome e senha a propriedade new_user
        $this->new_user = [
            "username" => $this->username,
            "password" => $this->encrypted_password,
        ];


        /// executa os métodos
        if($this->checkFieldValues()){
            $this->insertUser();
        }
        // se os campos de input n estao vazios entao insira o user ao arquivo
    }

    // checa se os campos de input estão preenchidos
    private function checkFieldValues(){
        // checa se os campos de nome ou senha estao vazios
        // se um deles esta vazio voltara uma msg de erro
        if(empty($this->username) || empty($this->raw_password)){
            $this->error = "Ambos os campos precisam ser preenchidos.";
            return false;
        } else{
            return true;
        }
    }
    
    // checa se o nome do user ja existe
    private function usernameExists(){
        // passa pelo arquivo json e assinala o user da vez com a variavel "$user"
        foreach($this->stored_users as $user){
            // se user name inserido no form for igual a um user ja registrado...
            if($this->username == $user['username']){
                $this->error = "Esse nome de usuário já existe. Escolha outro.";
                return true; // retorna true quando o nome do user já existe (isso vai ser util para a função insertUser)
            }
        }
        return false;
    }

    // insere o usuario o arquivo
    private function insertUser(){
        // checa se o nome esta disponivel
        if($this->usernameExists() == FALSE){
            // adiciona new_user ao array com os outros users
            // array_push: insere um elemento ao fim de um array
            array_push($this->stored_users, $this->new_user); // (array, valor)
            // file_put_contents: escreve informações num arquivo (caminho do arquivo, informações)
            // json_encode: converte o array em uma string json, (valor a ser encoded, )
            // JSON_PRETTY_PRINT: faz a string ficar mais bonita
            if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                return $this->success = "Você foi registrado com sucesso :)";
            } else{
                return $this->error = "Algo deu errado, tente de novo por favor :(";
            }
        }
    }
}

?> 