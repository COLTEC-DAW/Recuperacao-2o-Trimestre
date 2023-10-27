<?php
session_start();

    class Tarefa{

        var $titulo;
        var $prioridade;
        var $data;
        var $descricao;

        public function __construct($title, $priority, $date, $describe)
        {
            $date = date("d.m.Y");
            $this->titulo = $title;
            $this->prioridade = $priority;
            $this->data =$date;
            $this->descricao = $describe;
        }
        public function imprimeDados()
        {
            echo 'Título: ' . $this->titulo . '<br>';
            echo 'Prioridade: ' . $this->prioridade . '<br>';
            echo 'Vencimento: ' . $this->data . '<br>';
            echo 'Descrição: ' . $this->descricao . '<br><br>' ;
        }
    }
    function gerarObjArray()
    {
        $tarefas = [];
        $obj_array =[];
        
        $file_name = "~/json/".$_SESSION["user"]["userName"] . ".json";

        if (file_exists($file_name)) {
            $tarefas = json_decode(file_get_contents($file_name), true);
            // Verifique se a decodificação foi bem-sucedida
        
        }
        foreach ($tarefas as $t) {
            $obj_array[] = new Tarefa($t["titulo"], $t["prioridade"], $t["data"], $t["descricao"]);
        }

        return $obj_array;
    }
?>