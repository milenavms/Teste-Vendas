@extends('layout')

@section('titulo')
   {{ $titulo }}
@endsection


@section('cabecalho')
    <h1>Editar Usuários</h1>
@endsection


@section('conteudo')
<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil""></i> Editar Usuário</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-users"></i><a href="{{ route('listar_usuarios') }}">Usuários</a></li> 
              <li><i class="fa fa-pencil"></i>Editar</li>
            </ol>
          </div>
        </div>


        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Editar
              </header>
              <div class="panel-body">
                <div class="form">

                  <form class="form-validate form-horizontal" action=" {{route('update_usuarios', $u->id )}}" method="post" id="feedback_form" >
                  @csrf
                    <div class="form-group ">
                      <label for="nome" class="control-label col-lg-2">Nome<span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nome" name="nome" type="text" value="{{ $u->nome }}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="senha" class="control-label col-lg-2">Senha <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="senha" type="number" name="senha" value="{{ $u->senha }}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" type="text" name="email" value="{{ $u->email }}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cep" class="control-label col-lg-2">Cep <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cep" type="number" name="cep" value="{{ $u->cep }}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="rua" class="control-label col-lg-2">Rua <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="rua" type="text" name="rua" value="{{ $u->rua }}" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-success" >Salvar</button> <!--type="submit"-->
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </section>
          </div>
        </div>       
      </section>
    </section>
</section>




@endsection