@extends('layout')


@section('cabecalho')
    Relatórios
@endsection

@section('pdf')

<div class="top-nav">
    <ul class="nav pull-right">
    <li><a class="btn btn-success" href="/relatoriosPDF">
    <i class=" fa fa-file-pdf-o"></i> Baixar Relatório
    </a>
    </li>
    </ul>
</div>

@endsection


@section('conteudo')

 <section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-table"></i> Relatório</h3>
                

                <ol class="breadcrumb">
                    <li><i class="fa fa-table"></i>Relatório</li> 
                </ol>
            </div>
        </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tabela Geral das vendas
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="fa fa-shopping-basket"></i> Nome</th>
                                <th><i class="	fa fa-calendar-check-o"></i> Date Criação</th> 
                                <th><i class="	fa fa-money"></i> Preço</th>
                            </tr>
                            @foreach ($relatorios as $relatorio )
                            <tr>
                                <td>{{ $relatorio->nome_produto }}</td>
                                <td>{{ $relatorio->data_criacao }}</td>
                                <td>R$ {{ $relatorio->preco }}</td>                                
                            </tr> 
                            @endforeach 
                            <tr >
                                <th style="background-color:#7A8B8B; color: white"></i> TOTAL</th>
                                <td style="background-color:#7A8B8B;"></td>
                                <td style="background-color:#7A8B8B; color:White">{{ $total }}<//td>                                
                            </tr>                                                 
                           </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </section>   
</section>






 

@endsection