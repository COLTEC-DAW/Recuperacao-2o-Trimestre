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
            'Password'  => $senha,

        ]);
        
        if($insert)
            return redirect('/');
        else
            return redirect()->back();
    }

    public function ConfereLogin(request $request){

        $login=$request->input('login');
        $senha=htmlspecialchars($request->input('senha'));


        $this->validate($request, $this->cadastro->rulesLogin, $this->cadastro->messagesLogin);

        $query = DB::table('cadastros')
                ->selectRaw('Email = ? AND Password = ?', [$login,$senha])
                ->first();

        if($query==NULL||$query=='0')
            return redirect('/Home');
        else
            return redirect('/');
        
    }



      
}

