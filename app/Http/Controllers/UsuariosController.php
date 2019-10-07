<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosFormRequest;
use App\Usuario;
use App\Venda;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(Request $request){

        $usuarios = Usuario::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');  // msg de produto criado

        return view('usuarios.index', compact('usuarios', 'mensagem'));


    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UsuariosFormRequest $request)
    {

        $usuario = Usuario::create($request->all());

        $request->session()
            ->flash(
                'mensagem',
                "Usuário   $usuario->nome  criado com sucesso."
            );

        return redirect()->route( 'listar_usuarios'); //nome da rota

    }

    public function destroy(Request $request)
    {

        $vendas = Venda::join('usuarios', 'vendas.usuario_id', '=', 'usuarios.id')
        ->select('vendas.usuario_id')
        ->get();

        foreach($vendas as $item) {
            if($item->usuario_id == $request->id){
                $request->session()
                ->flash(
                'mensagem',
                "Este Usuário está sendo usado em Vendas, impossível remove-lo"
                );
                return redirect()->route( 'listar_usuarios');

            }         
        }   



        Usuario::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Usuário removido com sucesso"
            );
        return redirect()->route( 'listar_usuarios');
    }

    public function edit($id)
    {

        $usuarios = Usuario::findOrFail($id);

        $titulo = "Editar Usuários";

        if(empty($usuarios)) {

            return "Esse usuário não existe";
        }

        return view('usuarios.update', compact('usuarios', 'titulo'))->with('u', $usuarios);;

    }

    public function update(UsuariosFormRequest $request, $id)
    {

        $usuario = Usuario::findOrFail($id);
        $usuario->nome  = $request->nome;
        $usuario->senha = $request->senha;
        $usuario->email = $request->email;
        $usuario->cep = $request->cep;
        $usuario->rua = $request->rua;

        $usuario->save();

        $request->session()
            ->flash(
                'mensagem',
                "Modificações de {$usuario->nome } salvas com sucesso"
            );

        return redirect()->route( 'listar_usuarios');

    }

}
