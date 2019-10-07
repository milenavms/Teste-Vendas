<!doctype html>
<html lang=pt-BR>
<head>
    <meta charset="UTF-8">
    @yield('titulo')

    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/admin/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/admin/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon 
    <link href="{{ asset('css/admin/elegant-icons-style.css')}}" rel="stylesheet" />-->
    <link href="{{ asset('css/admin/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{ asset('css/admin/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin/style-responsive.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    @yield('script')

</head>
<body>

<!-- seção -->
<section id="container" class="">
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
            <i class="fa fa-reorder"></i>
            </div>
        </div>
        <a href="#" class="logo">Admin | VENDAS</span></a>  

        <!--botão baixar pdf-->
        @yield('pdf')

    </header>


    <aside>
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="{{ route('listar_relatorio') }}">
                        <i class="fa fa-table"></i>
                        <span>Relatório</span>
                    </a>
                </li>

                <li class="sub-menu">
                <a href="javascript:;" class="">
                <i class="fa fa-plus"></i>
                <span>Novo</span>
                <i class="fa fa-sort-down"></i>
                </a>
            <ul class="sub">
                <li><a href="{{ route('listar_produtos') }}"><i class="fa fa-shopping-basket"></i><span>produtos</span></a></li>
                <li><a href="{{ route('listar_usuarios') }}"><i class="fa fa-users"></i><span>Usuarios</span></a></li>
                <li><a href="{{ route('listar_vendas') }}"><i class="fa fa-cart-arrow-down"></i><span>Vendas</span></a></li>
            </ul>
          </li>
            </ul>
        </div>
    </aside>

    @yield('conteudo')

</section>



<!-- javascripts -->
<script src="{{ asset('js/admin/jquery.js')}}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js')}}"></script>
<!-- nicescroll -->
<script src="{{ asset('js/admin/jquery.scrollTo.min.js')}}"></script>
<script src="{{ asset('js/admin/jquery.nicescroll.js')}}" type="text/javascript"></script>
<!--custome script for all page-->
<script src="{{ asset('js/admin/scripts.js')}}"></script>
</body>
</html>