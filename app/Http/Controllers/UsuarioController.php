<?php


namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\cadastro;


class UsuarioController extends Controller
{

    /*//
    // Controlador das operações relacionadas aos usuários.
    //*/
    
    /*Variável global utilizada pra manipulação dos registros da tabela cadastros*/
    
    private $cadastro;

    /*Injeção da model 'cadastro' no controlador através do construtor interno*/

    public function __construct(cadastro $cadastro){
        $this->cadastro=$cadastro;       
    }

     /*Função que vai retornar a página de cadastro de novos usuários*/

    public function registrar(){
        return view('cadastro');
    }

    /*Função responsável por salvar o registro do novo usuário no banco de dados*/

    public function GuardarRegistro(request $request){

        /*Campos da requisição recuperados a partir do envio do formulário*/

        $nome=htmlspecialchars($request->input('nome'));
        $email=htmlspecialchars($request->input('email'));
        $senha=htmlspecialchars($request->input('senha'));

        /*Instância do helper de validação 'validate' declarada através da 
        //Facade:Validator contida no topo desta classe, ele recebe alguns parâmetros: 
        //o primeiro vai receber a requisição de dados em si, o segundo vai aplicar
        //as regras de validação sobre os dados recebido conforme definido na model
        //'cadastro' e o terceiro vai retornar as mensagens de erro caso a requisição seja
        //barrada.
        */
        $this->validate($request, $this->cadastro->rulesRegistro, $this->cadastro->messagesRegistro);

        /*Inserção de dados dos usuários cadastrados através do método create contido na 
        //model 'cadastro', e que está sendo aplicado através da variavel global acima '$cadastro'. 
        */
        $insert = $this->cadastro->create([

            'Name'      => $nome,
            'Email'     => $email,
            'Password'  => $senha,

        ]);
        
        /*Verifica se a inserção foi feita e redireciona pra home com uma mensagem,
        //caso contrário retorna pra página do formulário de cadastro de novas usuários
        //e retorna uma mensagem de falha.
        */
        if($insert){
            $request->session()->flash('success', 'Cadastro criado com sucesso!');
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
            
    }

    /*Função responsável por verificar o registro do usuário no banco de dados*/

    public function ConfereLogin(request $request){

        /*Campos da requisição recuperados a partir do envio do formulário*/

        $login=$request->input('login');
        $senha=htmlspecialchars($request->input('senha'));
        
        /*Mesmo esquema de validação encontrado acima, porém com as regras e mensages referentes
        //ao critério de login definido na model 'cadastro'.
        */
        $this->validate($request, $this->cadastro->rulesLogin, $this->cadastro->messagesLogin);
    
        /*Faz uma busca "crua" através da Facade:DB, declarada no topo desta classe, e recupera todos 
        //os objetos compatíveis com a pesquisa.
        */
        $query=DB::select('select Name from cadastros where Email = ? and Password = ? ', [$login,$senha]);

        /*Verifica se há algum registro compatível e redireciona pra hoem, caso contrário redireciona 
        //pra tela de login juntamente com uma mensagem de erro.
        */
        if(count($query)){
            return redirect('/Home');
        }   
        else{
            $request->session()->flash('wrong', 'E-mail ou Senha inválido');
            return redirect('/');
        }    
    }

    /*Função de LogOut*/
    public function LogingOut(){
        return redirect('/');
    }
    
}

