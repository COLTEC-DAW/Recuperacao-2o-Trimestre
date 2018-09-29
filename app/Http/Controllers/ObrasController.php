<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\obra;

class ObrasController extends Controller
{
    
    private $obras;

    public function __construct(obra $obras){
        
        $this->obras=$obras;
    }

    public function home()
    {
        return view('home');
    }

    public function adicionarObra(){
        return view('adicionarObra');
    }

    public function salvarObra(request $request){

        $nome=$request->input('nome');
        $resumo=$request->input('resumo');
        $editora=$request->input('editora');
        $num_exemplares=$request->input('num_exemplares');

        $this->validate($request, $this->obras->rulesObras, $this->obras->messagesObras);

        $insert = $this->obras->create([

            'nome'              => $nome,
            'resumo'            => $resumo,
            'editora'           => $editora,
            'num_exemplares'    => $num_exemplares,

        ]);
        
        if($insert){
            $request->session()->flash('inserido', 'Obra cadastrada com sucesso!');
            return redirect('/Home');
        }
        else
            $request->session()->flash('wrong', 'Falha ao inserir obra');
            return redirect()->back();
    }

}
