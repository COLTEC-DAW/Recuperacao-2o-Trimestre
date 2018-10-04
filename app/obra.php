<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obra extends Model
{

    /*//
    // Essa model é responsável pelo cadastro de novas obras,
    // ela é manipulada no ObrasControllers.
    //Ela é a representação da migration 2018_09_28_212707_create_obras_table
    // A migration se encontra dentro de database/migrations
    //*/

    /*Campos que podem ser preenchidos na tabela de obras*/

    protected $fillable = ['nome','autor','resumo','editora', 'num_exemplares'];

    /*Regras que são aplicadas aos campos de formulário do registro de novas obras*/

    public $rulesObras = [
        'nome'              =>'required|min:1|max:45|unique:obras,nome',
        'autor'             =>'required|min:1|max:45',
        'resumo'            =>'required|min:10|max:30|unique:obras,resumo',
        'editora'           =>'required|min:1|max:45',
        'num_exemplares'    =>'required|integer',
    ];

    /*Mensagens definidas conforme cada parâmetro de regra acima */

    public $messagesObras = [

        'nome.required'              => 'O livro precisa ter um nome',
        'nome.min'                   => 'O nome precisa conter no mínimo 3 caracteres',
        'nome.max'                   => 'O nome pode conter no máximo 45 caracteres',
        'nome.unique'                => 'Esse livro já foi cadastrado',
        'autor.required'             => 'O autor precisa ter um nome',
        'autor.min'                  => 'O nome do autor precisa conter no mínimo 1 caracteres',
        'autor.max'                  => 'O nome do autor pode conter no máximo 45 caracteres',
        'resumo.required'            => 'O livro deve conter um resumo',
        'resumo.unique'              => 'Esse resumo já existe',
        'resumo.min'                 => 'O resumo deve conter no mínimo 10 caracteres',
        'resumo.max'                 => 'O resumo pode conter no máximo 30 caracteres',
        'editora.required'           => 'Uma editora deve estar relacionada ao livro',
        'editora.min'                => 'O nome da editora deve conter no mínimo 1 caracteres',
        'editora.max'                => 'O nome da editora pode conter no máximo 45 caracteres',
        'num_exemplares.required'    => 'Número de exemplares requerido',
        'num_exemplares.integer'     => 'O número de exemplares deve ser inteiro',
    ];
}
