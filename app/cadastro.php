<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cadastro extends Model
{
    /*//
    // Essa model é responsável pelo cadastro de novos usuários, 
    // e é também através dela que fazemos a verificação de usuário 
    // no UsuarioController.
    // Ela é a representação da migration 2018_09_20_232513_create_cadastros_table
    // A migration se encontra dentro de database/migrations
    //*/

    /*Campos que podem ser preenchidos na tabela de cadastro*/

    protected $fillable = ['Name','Email','Password'];

    /*Regras que são aplicadas aos campos de formulário do registro*/

    public $rulesRegistro = [
        'nome'      => 'required|min:3|max:45',
        'email'     => 'required|min:3|max:45|email|unique:cadastros,Email',
        'senha'     => 'required|min:3|max:8',
    ];

    /*Mensagens definidas conforme cada parâmetro de regra acima */

    public $messagesRegistro = [
        'nome.required'     => 'Campo Nome é de preenchimento obrigatório',
        'nome.min'          => 'Campo Nome no mínimo 3 caracteres',
        'nome.max'          => 'Campo Nome no máximo 45 caracteres',
        'email.required'    => 'Campo E-mail é de preenchimento obrigatório',
        'email.unique'      => 'E-mail já existente',
        'email.min'         => 'Campo E-mail deve ter no mínimo 3 caracteres',
        'email.max'         => 'Campo E-mail deve ter no máximo 45 caracteres',
        'email.email'       => 'O E-mail deve ser válido',
        'senha.required'    => 'Campo Senha é de preenchimento obrigatório',
        'senha.min'         => 'Campo Senha deve ter no mínimo 3 caracteres',
        'senha.max'         => 'Campo Senha deve ter no máximo 8 caracteres',
    ];

    /*Regras que são aplicadas aos campos de formulário de login*/

    public $rulesLogin = [
        'login'     => 'required|min:3|max:45|email',
        'senha'     => 'required|min:3|max:8',
    ];

    /*Mensagens definidas conforme cada parâmetro de regra acima */

    public $messagesLogin = [
        
        'login.required'    => 'Campo E-mail é de preenchimento obrigatório',
        'login.min'         => 'Campo E-mail deve ter no mínimo 3 caracteres',
        'login.max'         => 'Campo E-mail deve ter no máximo 45 caracteres',
        'login.email'       => 'O E-mail deve ser válido',
        'senha.required'    => 'Campo Senha é de preenchimento obrigatório',
        'senha.min'         => 'Campo Senha deve ter no mínimo 3 caracteres',
        'senha.max'         => 'Campo Senha deve ter no máximo 8 caracteres',
    ];

    
}
