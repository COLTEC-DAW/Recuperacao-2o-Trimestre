<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\obra;
class ObrasController extends Controller
{
    /*//
    // Controlador das operações relacionadas as obras.
    //*/
    /*Variável global utilizada pra manipulação dos registros da tabela obras*/
    private $obras;
    /*Injeção da model 'obra' no controlador através do construtor interno*/
    public function __construct(obra $obras){
        $this->obras=$obras;
    }
    /*Função que vai retornar a página inicial com todos os registros contidos na tabela 'obras'*/
    public function home(){
        $obras = $this->obras->all();
        return view('home')->with('obras',$obras);
    }
    /*Função que vai retornar a página com o formulário de cadastro de novas obras*/
    public function adicionarObra(){
        return view('adicionarObra');
    }
    /*Função responsável por salvar o registro da nova obra no banco de dados*/
    public function salvarObra(request $request){
        /*Campos da requisição recuperados a partir do envio do formulário*/
        $nome=htmlspecialchars($request->input('nome'));
        $autor=htmlspecialchars($request->input('autor'));
        $resumo=htmlspecialchars($request->input('resumo'));
        $editora=htmlspecialchars($request->input('editora'));
        $num_exemplares=htmlspecialchars($request->input('num_exemplares'));
        /*Instância do helper de validação 'validate' declarada através da Facade:Validator
        //contida no topo desta classe, ele recebe alguns parâmetros: 
        //o primeiro vai receber a requisição de dados em si, o segundo vai aplicar
        //as regras de validação sobre os dados recebido conforme definido na model
        //'obra' e o terceiro vai retornar as mensagens de erro caso a requisição seja
        //barrada.
        */
        $this->validate($request, $this->obras->rulesObras, $this->obras->messagesObras);
        /*Inserção de dados das obras cadastradas através do método create contido na 
        //model 'obra', e que está sendo aplicado através da variavel global acima '$obras'. 
        */
        $insert = $this->obras->create([
            'nome'              => $nome,
            'autor'             => $autor,
            'resumo'            => $resumo,
            'editora'           => $editora,
            'num_exemplares'    => $num_exemplares,
        ]);
        
        /*Verifica se a inserção foi feita e redireciona pra home com uma mensagem,
        //caso contrário retorna pra página do formulário de cadastro de novas obras
        //e retorna uma mensagem de falha.
        */
        if($insert){
            $request->session()->flash('inserido', 'Obra cadastrada com sucesso!');
            return redirect('/Home');
        }
        else
            $request->session()->flash('wrong', 'Falha ao inserir obra');
            return redirect()->back();
    }
    /*Função responsável por buscar obras especificadas a partir da barra de busca*/
    public function buscarObras(request $request){
        
        /*Recebe o dado da requisição inserido na barra de busca*/
        $pesquisa = htmlspecialchars($request->input('busca'));
        
        /*Faz uma busca "crua" através da Facade:DB, declarada no topo desta classe, e recupera todos 
        //os objetos compatíveis com a pesquisa.
        */
        $resultados = DB::table('obras')
                        ->whereRaw('nome like ? or autor like ? or editora like ?', [$pesquisa,$pesquisa,$pesquisa])
                        ->get();
        
        /*Retorna a view resposta com os resultados da pesquisa*/
        return view('pesquisaresposta', ['respostas'=>$resultados]);
    }
}