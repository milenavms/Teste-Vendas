@extends('layout')

@section('titulo')
    <title>{{ $titulo }}</title>
@endsection


@section('cabecalho')
    Editar Produtos
@endsection


@section('conteudo')



<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil""></i> Editar Produto</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-shopping-basket"></i><a href="{{ route('listar_produtos') }}">Produtos</a></li> 
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

                  <form class="form-validate form-horizontal" action=" {{route('update_produto', $p->id )}}" method="post" id="feedback_form" >
                  @csrf
                    <div class="form-group ">
                      <label for="nome" class="control-label col-lg-2">Nome do produto<span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nome" name="nome" minlength="5" type="text" value="{{ $p->nome }}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="preco" class="control-label col-lg-2">Preço <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="preco" type="number" name="preco" value="{{ $p->preco }}" />
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