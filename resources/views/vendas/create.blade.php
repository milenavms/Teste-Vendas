@extends('layout')

@section('cabecalho')
    Salvar uma Venda
@endsection


@section('conteudo')

   
<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
      
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-cart-arrow-down""></i> Nova Venda</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-cart-arrow-down"></i><a href="{{ route('listar_vendas') }}">Vendas</a></li> 
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
                   <div class="form-group">
                        <label class="control-label col-lg-2" for="inputSuccess">Produto</label>
                        <div class="col-lg-10">
                    
                        <select name="produto_id" id="produto_id" class="form-control m-bot15">                           
                            @foreach($produtos as $produto)
                                <option value= "{{ $produto->id }}"> {{ $produto->nome }}</option>
                            @endforeach
                        </select>  
                        </div>                     
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-lg-2" for="inputSuccess">Vendedores</label>
                        <div class="col-lg-10">        
                        <select name="usuario_id" id="usuario_id" class="form-control m-bot15">
                          @foreach($usuarios as $usuarios)
                                <option value= "{{ $usuarios->id }}"> {{ $usuarios->nome }}</option>
                            @endforeach
                        </select>
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