<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de compras</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/my-nav.css">

    <script src="../js/angularjs/angular.min.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/font-awesome.css">


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
                <img alt=" CASA DAS MARMITAS" class="glyphicon glyphicon-home img-logo" src="../resources/img/logo.png">
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

<?php

include '../inc/config_bd.php';
include '../inc/conexao.php';
include '../model/entregadores/funcoes_entregadores.php';
include '../inc/Funcoes_auxiliares.php';


$entregador_id = 3;
$data_inicio = "2017-10-02";
$data_final = "2017-10-02";


$sql_code = "SELECT * FROM entregas WHERE entregador_id=" . $entregador_id . " AND data_entrega LIKE  '%" . $data_inicio . "%';";

//$sql_code = "SELECT * FROM entregas WHERE entregador_id=".$entregador_id." AND data_entrega >= '".$data_inicio."' AND data_entrega <= '".$data_final."';";

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$entregas = $execute->fetch_assoc();

$num_entregas = $mysqli->query($sql_code)->num_rows;

//$nome_entregador = buscaEntregadorNome($entregas['entregador_id']);
$nome_entregador = buscaEntregadorNome($entregador_id);

?>

<section>
    <div class="container" id="main">
        <?php //include_once("../model/entregadores/relatorio-entregador.php"); ?>

        <div class="container-fluid hidden-print" id="opcoes">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-sm-6">
                            <h2>Relatorio individual de entregas</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group h2">
                                <input class="btn btn-primary" type="button" id="listar" value="LISTAR">
                                <input class="btn btn-success" type="button" id="imprimir" value="IMPRIMIR">
                                <a href="listar-entregadores-0" class="btn btn-default" id="voltar">VOLTAR</a>
                                <input type="button" id="teste" class="btn btn-warning" value="TESTAR">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="" for="data-inicio">DATA INICIO</label>
                    <input type="date" min="2017-01-02" value="2017-10-01" id="data-inicio">
                </div>
                <div class="col-md-3" style="margin-left: 4px">
                    <label class="" for="data-ifinal">DATA FINAL</label>
                    <input type="date" id="data-inicio">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12" id="resultado" style="margin-top: 20px; margin-bottom: 15px">
                <div class="col-sm-6">
                    <h2 class="visible-print text-center">Relatorio individual de entregas</h2>
                </div>
                <h4>Nome: <?php echo $nome_entregador; ?> - Código Nº: <?php echo $entregas['entregador_id']; ?></h4>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr style="background-color: #337ab7; color: white; font-weight: bold">
                        <td>Nº pedido</td>
                        <td>Data</td>
                        <td class="text-center">Valor</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php do {

                        if ($num_entregas == 0) {
                            ?>
                            <td colspan="3" class="text-center">
                            <h3><?php echo "Nenhuma entrega para os parametros informados"; ?></h3></td> <?php
                            break;
                        }

                        ?>


                        <tr>
                            <td><?php echo $entregas['pedido_id']; ?></td>
                            <td><?php echo Funcoes_auxiliares::getDataFormatada($entregas['data_entrega']); ?></td>
                            <td class="text-center"><?php
                                echo "R$ " . Funcoes_auxiliares::formataValor(buscaValorTotalPedido($entregas['pedido_id']));
                                ?></td>

                        </tr>

                    <?php } while ($entregas = $execute->fetch_assoc()); ?>

                    <tr>
                        <td colspan="3">
                            <div class="pull-right" style="margin-right: 50px">
                                TOTAL DA COMISSÃO R$: <span
                                        id="total"><?php echo Funcoes_auxiliares::formataValor($num_entregas * 4.50) ?></span>
                            </div>
                        </td>
                    </tr>

                    </tbody>

                </table>
            </div>
        </div>

    </div>
</section>


<script src="../js/jquery/jquery.min.js"></script>
<script src="../js/bootstrap/bootstrap.min.js"></script>
<script src="../js/funcoes-menu.js"></script>

<script>

    $("#pedidos").addClass("active");


</script>


</body>
</html>