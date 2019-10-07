@extends('layout')

@section('titulo')
    <title>{{ $titulo }}</title>
@endsection


@section('cabecalho')
Adicionar Produtos
@endsection


@section('conteudo')




<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
      
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-square-o""></i> Novo Produto</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-shopping-basket"></i><a href="{{ route('listar_produtos') }}">Produtos</a></li> 
              <li><i class="fa fa-plus-square-o"></i>Adicionar</li>
            </ol>
          </div>
        </div>


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
                Formulário
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                  @csrf
                    <div class="form-group ">
                      <label for="nome" class="control-label col-lg-2">Nome do produto<span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nome" name="nome" type="text"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="preco" class="control-label col-lg-2">Preço <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="preco" type="number" name="preco"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
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