@extends('layout')

@section('cabecalho')
    Adicionar Usuários

@endsection

@section('script')
        <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

    </script>
@endsection





@section('conteudo')


<section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
      
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-square-o""></i> Novo Usuário</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i>Novo</li>
              <li><i class="fa fa-users"></i><a href="{{ route('listar_usuarios') }}">Usuários</a></li> 
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
                      <label for="nome" class="control-label col-lg-2">Nome<span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nome" name="nome" type="text"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="senha" class="control-label col-lg-2">Senha <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="senha" type="password" name="senha"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" type="text" name="email"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cep" class="control-label col-lg-2">Cep <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" onblur="pesquisacep(this.value);" id="cep" type="number" name="cep"  placeholder="Ex.: 00000000"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="rua" class="control-label col-lg-2">Rua <span>*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="rua" type="text" name="rua"  />
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

