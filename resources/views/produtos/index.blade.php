@extends('layout')


@section('titulo')
    <title>{{ $titulo }}</title>
@endsection

@section('cabecalho')
Produtos
@endsection


@section('conteudo')

   

    <section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-shopping-basket"></i> Produtos</h3>
                

                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>Novo</li>
                    <li><i class="fa fa-shopping-basket"></i>Produtos</li> 
                </ol>
            </div>
        </div>
        </div>

        @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
        @endif

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tabela de Produtos
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                          
                            <tr>
                                <th><i class="fa fa-shopping-basket"></i> Nome</th>                                 
                                <th><i class="fa fa-money"></i> Preço</th>
                                <th><i class="fa fa-calendar-check-o"></i> Date Criação</th>
                                <th><i class="fa fa-gears"></i> Ações</th>
                            </tr>

                            @foreach ($produtos as $produto )
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->data_criacao }}</td>                                 
                                <td>
                                <span class="d-flex">
                                    <form method="get" action= "{{ route('editar_produto', $produto->id)}}"    >
                                        @csrf
                                        <button class="btn btn-success btn-sm mr-1" >
                                        <i class="fa fa-pencil"></i>
                                        </button>
                                       
                                    </form> 
                                    <form method="post" action= "{{ route('remover_produto', $produto->id)}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $produto->nome )}}?')">
                                        @csrf
                                        <button class="btn btn-danger btn-sm " >
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>                               
                                </span>
                                </td>
                            </tr> 
                            @endforeach 

                           </tbody>
                        </table>
                    </section>
                </div>
            </div>

            <a class="btn btn-primary " href="{{ route('form_criar_produto')}}" >Adicionar</a>
     
    </section>                             
</section>




@endsection
