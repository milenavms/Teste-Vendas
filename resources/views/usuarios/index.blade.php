@extends('layout')

@section('cabecalho')
    Usuários
@endsection


@section('conteudo')

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-users"></i> Usuários</h3>
                

                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>Novo</li>
                    <li><i class="fa fa-users"></i>Usuarios</li> 
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
                            Tabela de Usuários
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                          
                            <tr>
                                <th><i class="fa fa-user"></i> Nome</th>                                 
                                <th><i class="fa fa-envelope-o"></i> Email</th>
                                <th><i class="fa fa-bullseye"></i> Cep</th>
                                <th><i class="fa fa-map-marker"></i> Rua</th>
                                <th><i class="fa fa-calendar-check-o"></i> Criado em</th>
                                <th><i class="fa fa-gears"></i> Ações</th>
                            </tr>

                            @foreach ($usuarios as $usuario )
                            <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->cep }}</td>
                                <td>{{ $usuario->rua }}</td>
                                <td>{{ $usuario->data_criacao }}</td>                                 
                                <td>
                                <span class="d-flex">
                                    <form method="get" action= "{{ route('editar_usuarios', $usuario->id)}}"    >
                                        @csrf
                                        <button class="btn btn-success btn-sm mr-1" >
                                        <i class="fa fa-pencil"></i>
                                        </button>
                                       
                                    </form> 
                                    <form method="post" action= "{{ route('remover_usuario', $usuario->id)}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $usuario->nome )}}?')">
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
            <a class="btn btn-primary " href="{{ route('form_criar_usuarios')}}" >Adicionar</a>
    </section>                   
</section>




@endsection
