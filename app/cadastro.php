<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cadastro extends Model
{
    protected $fillable = ['name','e-mail','password'];

    public $rules = [
        'nome'      => 'required|min:3|max:45',
        'email'     => 'required|min:3|max:45|email',
        'senha'     => 'required|min:3|max:8',
    ];

    public $messages = [
        'nome.required'     => 'Campo Nome é de preenchimento obrigatório',
        'nome.min'          => 'Campo Nome no mínimo 3 caracteres',
        'nome.max'          => 'Campo Nome no máximo 45 caracteres',
        // 'email.required'    => 'Campo E-mail é de preenchimento obrigatório',
        'email.unique'      => 'Esse e-mail já existe',
        'email.min'         => 'Campo E-mail deve ter no mínimo 3 caracteres',
        'email.max'         => 'Campo E-mail deve ter no máximo 45 caracteres',
        'email.email'       => 'O E-mail deve ser válido',
        'senha.required'    => 'Campo Senha é de preenchimento obrigatório',
        'senha.min'         => 'Campo Senha deve ter no mínimo 3 caracteres',
        'senha.max'         => 'Campo Senha deve ter no máximo 8 caracteres',
    ];
}
