<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\DB;
use App\obras;

class ObrasController extends Controller
{
    
    private $obras;

    public function __construct(obras $obras){
        
        $this->obras=$obras;
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
        
        if($insert)
            return redirect('/Home');
        else
            return redirect()->back();
    }


}

