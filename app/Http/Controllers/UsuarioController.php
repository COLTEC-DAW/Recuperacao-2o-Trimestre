<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
 
    public function registrar()
    {
        return view('cadastro');
    }


    public function GuardarRegistro(request $request){

       
        $messages = [
            'nome.required' => 'Campo Vazio',
            'email.required' => 'Campo Vazio',
            'senha.required' => 'Campo Vazio',
            'senha.size' => 'Campo deve ter no máximo 8 caracteres'
        ];

        $validacao = Validator::make($request->all(),$rules=[],$messages, [
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required|max:8', 
        ]);

    
        if ($validacao->fails()) {
            return action('UsuarioController@registrar')
                        ->withErrors($validacao)
                        ->withInput();
        }else{
            $nome=$request->input('nome');
            $email=$request->input('email');
            $senha=htmlspecialchars($request->input('senha'));
            //$loginsRegistrados = $array[$request->input('email')];
            
            DB::insert('INSERT INTO usuarios(nome,e_mail,senha) VALUES(?,?,?)',[$nome,$email,$senha]);

            return back();
        }
        
    }

    public function ConfereLogin(request $request){

        $login=$request->input('login');
        $senha=htmlspecialchars($request->input('senha'));
        $confirmar=$request->input('confirmar');

        DB::select('SELECT *  FROM usuarios WHERE e_mail = ? AND senha = ? ', [$login,$senha]);
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/';</script>";
          die();
        }else{
            function home()
            {
                return view('resposta');
            }
            }
              
            setcookie("login",$login);
            header("Location:{{URL::to('/Home')}}");
        
        }
}

