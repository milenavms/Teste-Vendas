@extends('layout')

@section('cabecalho')
    Vendas
@endsection


@section('conteudo')


<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-cart-arrow-down"></i> Vendas</h3>
                

                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>Novo</li>
                    <li><i class="fa fa-cart-arrow-down"></i>Vendas</li> 
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
                            Tabela de Vendas
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                          
                            <tr>                                                            
                                <th><i class="fa fa-shopping-basket"></i> Produto</th>
                                <th><i class="fa fa-user"></i> Vendedor</th>
                                <th><i class="fa fa-calendar-check-o"></i> Criado em</th>

                            @foreach ($vendas as $venda )
                            <tr>
                                <td>{{ $venda->nome_produto  }}</td>
                                <td>{{ $venda->nome_usuario  }}</td>
                                <td>{{ $venda->data_criacao}}</td>                                 
                                
                            </tr> 
                            @endforeach 

                           </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <a class="btn btn-primary " href="{{ route('form_criar_vendas')}}" >Adicionar</a>
    </section>                   
</section>


@endsection
