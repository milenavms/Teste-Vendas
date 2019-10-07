<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendasFormRequest;

use App\Produto;
use App\Usuario;
use App\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function index(Request $request){
        $vendas = Venda::join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->join('usuarios', 'vendas.usuario_id', '=', 'usuarios.id')
            ->select('produtos.nome as nome_produto','usuarios.nome as nome_usuario','vendas.data_criacao', 'produtos.preco')
            ->get();    

        $mensagem = $request->session()->get('mensagem');  // msg de produto criado

        return view('vendas.index', compact('vendas', 'mensagem'));


    }

    public function create( )
    {

        $produtos = Produto::query()
            ->orderBy('nome')
            ->get();
        $usuarios = Usuario::query()
            ->orderBy('nome')
            ->get();

        return view('vendas.create',  compact('produtos', 'usuarios'));
    }

    public function store(VendasFormRequest $request)
    {

        Venda::create($request->all());


        $request->session()
            ->flash(
                'mensagem',
                "Venda  salva com sucesso."
            );

        return redirect()->route( 'listar_vendas'); //nome da rota

    }
}
