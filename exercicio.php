<?php
final class Exercicio
{

    public string $nome;
    public int $repeticoes;
    public string $tipo;
    public string $equipamento;
    public string $parte_afetada;

    public function __construct(string $nome, int $repeticoes, string $tipo, string $equipamento, string $parte_afetada)
    {
        $this->nome = $nome;
        $this->repeticoes = $repeticoes;
        $this->tipo = $tipo;
        $this->equipamento = $equipamento;
        $this->parte_afetada = $parte_afetada;
    }
}
?>