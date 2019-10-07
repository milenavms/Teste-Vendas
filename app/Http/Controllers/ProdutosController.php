<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProdutosFormRequest;
use Illuminate\Http\Request;
use App\Produto;
use App\Venda;

class ProdutosController extends Controller
{
    public function index(Request $request){   //listrar produtos

       $produtos = Produto::query()
           ->orderBy('nome')
           ->get();

        $mensagem = $request->session()->get('mensagem');  // msg de produto criado

        $titulo = "Produtos";

        return view('produtos.index', compact('produtos', 'mensagem', 'titulo'));


    }

    public function create()
    {
        $titulo = "Produtos";
        return view('produtos.create', compact('titulo'));
    }




    public function store(ProdutosFormRequest $request)
    {



        $produto = Produto::create($request->all());

        $request->session()
            ->flash(
        'mensagem',
        "Produto   $produto->nome  criada com sucesso."
        );

      return redirect()->route( 'listar_produtos'); //nome da rota

    }

    public function destroy(Request $request)
    {
        
       

        $vendas = Venda::join('produtos', 'vendas.produto_id', '=', 'produtos.id')
        ->select('vendas.produto_id')
        ->get();


        foreach($vendas as $item) {
            if($item->produto_id == $request->id){
                $request->session()
                ->flash(
                'mensagem',
                "Este produto está sendo usado em Vendas, impossível remove-lo"
                );
                return redirect()->route( 'listar_produtos');

            }         
        }       


            Produto::destroy($request->id);           
            $request->session()
                ->flash(
                    'mensagem',
                    "Produto removido com sucesso"
                );
            return redirect()->route( 'listar_produtos');
             
      
    }

    public function edit($id)
    {
        // recupera produto do BD
        $produtos = Produto::findOrFail($id);

        $titulo = "Editar Produtos";

        if(empty($produtos)) {

            return "Esse produto não existe";
        }

        return view('produtos.update', compact('produtos', 'titulo'))->with('p', $produtos);;



    }

    public function update(ProdutosFormRequest $request, $id)
    {

        $produto = Produto::findOrFail($id);
        $produto->nome  = $request->nome;
        $produto->preco = $request->preco;

        $produto->save();

        $request->session()
            ->flash(
                'mensagem',
                "Modificações de {$produto->nome } salvas com sucesso"
            );

        return redirect()->route( 'listar_produtos');

    }






};