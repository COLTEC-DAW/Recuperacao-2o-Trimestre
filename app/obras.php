<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obras extends Model
{
    protected $fillable = ['nome','resumo','editora', 'num_exemplares'];

    public $rulesObras = [
        'nome'              =>'required|min:1|max:45|unique:obras,nome',
        'resumo'            =>'required|min:10|max:100|unique:obras,resumo',
        'editora'           =>'required|min:1|max:45',
        'num_exemplares'    =>'required|integer',
    ];

    public $messagesObras = [

        'nome.required'              => 'O livro precisa ter um nome',
        'nome.min'                   => 'O nome precisa conter no mínimo 3 caracteres',
        'nome.max'                   => 'O nome pode conter no máximo 45 caracteres',
        'nome.unique'                => 'Esse livro já foi cadastrado',
        'resumo.required'            => 'O livro deve conter um resumo',
        'resumo.unique'              => 'Esse resumo já existe',
        'resumo.min'                 => 'O resumo deve conter no mínimo 10 caracteres',
        'resumo.max'                 => 'O resumo pode conter no máximo 100 caracteres',
        'editora.required'           => 'Uma editora deve estar relacionada ao livro',
        'editora.min'                => 'O nome da editora deve conter no mínimo 1 caracteres',
        'editora.max'                => 'O nome da editora pode conter no máximo 45 caracteres',
        'num_exemplares.required'    => 'Número de exemplares requerido',
        'num_exemplares.integer'     => 'O número de exemplares deve ser inteiro',
        

    ];

}
