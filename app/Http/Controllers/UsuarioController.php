<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\cadastro;


class UsuarioController extends Controller
{
    
    private $cadastro;

    public function __construct(cadastro $cadastro, obras $obras){
        $this->cadastro=$cadastro;       
    }

    public function registrar()
    {
        return view('cadastro');
    }

    public function home()
    {
        return view('home');
    }

    public function GuardarRegistro(request $request){

        $nome=$request->input('nome');
        $email=$request->input('email');
        $senha=htmlspecialchars($request->input('senha'));

        $this->validate($request, $this->cadastro->rulesRegistro, $this->cadastro->messagesRegistro);

        $insert = $this->cadastro->create([

            'Name'      => $nome,
            'Email'     => $email,
            'Password'  => Hash::make($senha),

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

        /*
        $login=$request->input('login');
        $senha=htmlspecialchars($request->input('senha'));
        */
        
        $this->validate($request, $this->cadastro->rulesLogin, $this->cadastro->messagesLogin);

        $credentials = $request->only('login', 'senha');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/Home');
        }
        else{
            $request->session()->flash('wrong', 'E-mail ou Senha inválido');
            return redirect()->back();
        }
            

        /*
        $query=DB::select('select Name from cadastros where Email = ? and Password = ? ', [$login,$senha]);

        if(count($query)){
            /*$usuario = $request->cookie('nome',$query);
            return redirect('/Home');/*->with('nome', $usuario);
        }   
        else{
            return redirect('/');
        }
        */
        
    }

    public function LogingOut(){
        Auth::logout();
    }
    
}

