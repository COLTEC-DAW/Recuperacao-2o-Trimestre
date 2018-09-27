<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\cadastro;
use App\obras;

class UsuarioController extends Controller
{
    
    private $cadastro;
    private $obras;

    public function __construct(cadastro $cadastro, obras $obras){
        $this->cadastro=$cadastro;
        $this->obras=$obras;
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

        $query=DB::select('select Name from cadastros where Email = ? and Password = ? ', [$login,$senha]);

        if(count($query))
            return redirect('/Home');
        else
            return redirect('/');
            
        
    }

    public function adicionarObra(){
        return view('adicionarObra');
    }

    public function salvarObra(request $request){

        $nome=$request->input('nome');
        $resumo=$request->input('resumo');
        $editora=$request->input('editora');
        $num_exemplares=$request->input('num_exemplares');

       // $this->validate($request, $this->cadastro->rulesRegistro, $this->cadastro->messagesRegistro);

        $insert = $this->obras->create([

            'nome'      => $nome,
            'resumo'    => $resumo,
            'editora'  => $editora,
            'num_exemplares' => $num_exemplares,

        ]);
        
        if($insert)
            return redirect('/');
        else
            return redirect()->back();
    }


=======


      
>>>>>>> 543463c53f949c92b8be72b8b9b2ba4c4073462a
}

