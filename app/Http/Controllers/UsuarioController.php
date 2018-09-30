<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\cadastro;


class UsuarioController extends Controller
{
    
    private $cadastro;

    public function __construct(cadastro $cadastro){
        $this->cadastro=$cadastro;       
    }

    public function registrar()
    {
        $title = 'Registrar';

        return view('cadastro',compact('title'));
    }


    public function GuardarRegistro(request $request){

        $nome=htmlspecialchars($request->input('nome'));
        $email=htmlspecialchars($request->input('email'));
        $senha=htmlspecialchars($request->input('senha'));

        $this->validate($request, $this->cadastro->rulesRegistro, $this->cadastro->messagesRegistro);

        $insert = $this->cadastro->create([

            'Name'      => $nome,
            'Email'     => $email,
            'Password'  => $senha,

        ]);
        
        if($insert){
            $request->session()->flash('success', 'Cadastro criado com sucesso!');
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
            
    }

    public function ConfereLogin(request $request){

        
        $login=$request->input('login');
        $senha=htmlspecialchars($request->input('senha'));
        
        
        $this->validate($request, $this->cadastro->rulesLogin, $this->cadastro->messagesLogin);
    
        $query=DB::select('select Name from cadastros where Email = ? and Password = ? ', [$login,$senha]);
        //$name=strval($query);

        if(count($query)){
            //setcookie("usuario","$name");
            $title = 'Página Inicial';
            return redirect('/Home')->with('title',$title);
        }   
        else{
            $request->session()->flash('wrong', 'E-mail ou Senha inválido');
            return redirect('/');
        }
        
        
    }

    public function LogingOut(){
        return redirect('/');
    }
    
}

