<?php
final class User
{

    public string $nome;
    public string $email;
    public string $nome_usuario;
    public string $senha;
    public $listaExercicios = [];

    public function __construct(string $nome, string $email, string $nome_usuario, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->nome_usuario = $nome_usuario;
        $this->senha = $senha;
    }
}
?>