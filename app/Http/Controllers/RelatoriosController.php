<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Usuario;
use App\Venda;

class RelatoriosController extends Controller
{

    public function index(Request $request){   //listrar as vendas e seus relacionamtos

       //nome-data-preço
        $relatorios = Venda::join('produtos', 'vendas.produto_id', '=', 'produtos.id')
        ->select('produtos.nome as nome_produto','vendas.data_criacao', 'produtos.preco')
        ->get();


        //total de vendas
        $total = 0;
        foreach($relatorios as $item) {
            $total += $item->preco;
        }

        

        
        return view('relatorios.index', compact('relatorios', 'total'));
 
    }
    
}
