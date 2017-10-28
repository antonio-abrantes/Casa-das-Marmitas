</head>
<body>

<nav>
    <div class="container-fluid visible-sm-block visible-md-block visible-lg-block">
        <div id="faixa-preta-cabecalho" class="row">
            <!-- FAIXA PRETA DO CABEÇALHO DA PAGINA -->
        </div>
    </div>


    <!-- INICIO DO MENU PRINCIPAL -->
    <div class="nav-side-menu">
        <div class="brand" id="brand-logo">
            <a href="#">
                <img alt=" CASA DAS MARMITAS" class="glyphicon glyphicon-home img-logo" src="resources/img/logo.png">
            </a>
        </div>
        <i class="fa fa-bars fa-2x toggle-btn hidden-print" data-toggle="collapse" data-target="#menu-content"></i>
    <!--    <i style="margin-top: 10px" class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <i style="margin-top: 20px" class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i> -->
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li id="principal" class="">
                    <a href="index.php">
                        <i class="glyphicon glyphicon-home"></i> HOME
                    </a>
                </li>

                <li id="clientes" data-toggle="collapse" data-target="#ger-clientes" class="collapsed">
                    <a href="#"><i class="fa fa-address-book-o"></i> CLIENTES </a>
                </li>
                <ul class="sub-menu collapse" id="ger-clientes">
                    <li><a href="novo-cliente">Novo cliente</a></li>
                    <li><a href="listar-clientes-0">Listar clientes</a></li>
                </ul>

                <li id="pedidos" data-toggle="collapse" data-target="#ger-pedidos" class="collapsed">
                    <a href="#"><i class="fa fa-cart-plus"></i> PEDIDOS </a>
                </li>
                <ul class="sub-menu collapse" id="ger-pedidos">
                    <li><a href="novo-pedido">Novo pedido</a></li>
                    <li><a href="listar-pedidos-0">Listar pedidos</a></li>
                </ul>

                <li id="produtos" data-toggle="collapse" data-target="#ger-produtos" class="collapsed">
                    <a href="#"><i class="fa fa-cutlery"></i> PRODUTOS </a>
                </li>
                <ul class="sub-menu collapse" id="ger-produtos">
                    <li><a href="novo-produto">Novo produto</a></li>
                    <li><a href="listar-produtos-0">Listar produtos</a></li>
                </ul>

                <li id="empresas" data-toggle="collapse" data-target="#ger-empresas" class="collapsed">
                    <a href="#"><i class="fa fa-briefcase"></i> EMPRESAS </a>
                </li>
                <ul class="sub-menu collapse" id="ger-empresas">
                    <li><a href="nova-empresa">Nova empresa</a></li>
                    <li><a href="listar-empresas-0">Listar empresas</a></li>
                </ul>

                <li id="entregadores" data-toggle="collapse" data-target="#ger-entregadores" class="collapsed">
                    <a href="#"><i class="fa fa-motorcycle"></i> ENTREGADORES </a>
                </li>
                <ul class="sub-menu collapse" id="ger-entregadores">
                    <li><a href="novo-entregador">Novo entregador</a></li>
                    <li><a href="listar-entregadores-0">Listar entregadores</a></li>
                    <li><a href="relatorio-geral">Relatorio de entregas</a></li>
                </ul>

                <li id="taxas" data-toggle="collapse" data-target="#ger-taxas" class="collapsed">
                    <a href="#"><i class="fa fa-usd"></i> TAXAS </a>
                </li>
                <ul class="sub-menu collapse" id="ger-taxas">
                    <li><a href="nova-taxa">Nova taxa</a></li>
                    <li><a href="#">Listar taxas</a></li>
                </ul>

                <li id="funcionarios" data-toggle="collapse" data-target="#ger-funcionarios" class="collapsed">
                    <a href="#"><i class="fa fa-users"></i> FUNCIONÁRIOS </a>
                </li>
                <ul class="sub-menu collapse" id="ger-funcionarios">
                    <li><a href="novo-funcionario">Novo funcionário</a></li>
                    <li><a href="#">Listar funcionários</a></li>
                </ul>

            </ul>
        </div>
    </div>
</nav>