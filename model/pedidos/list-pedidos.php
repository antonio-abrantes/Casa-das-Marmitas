<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';
include "funcoes_pedido.php";

$itens_por_pagina = 10;
//
//// Pegar pagina atual
$pagina = intval($pagina);
//
//Puxar o produto do banco

$sql_code = "SELECT id, cliente_id, quantidade_total, taxa_id, total_pedido, situacao_pedido FROM pedidos LIMIT $pagina, $itens_por_pagina";

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$pedidos = $execute->fetch_assoc();

$num = $execute->num_rows;

//Quantidade total de obejtos no banco de dados
$num_total = $mysqli->query("SELECT cliente_id, taxa_id, total_pedido, situacao_pedido FROM pedidos")->num_rows;

//Definir numero de paginas
$num_paginas = ceil($num_total/$itens_por_pagina);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-3">
                    <h2>Pedidos</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Pedidos">
                        <input type="hidden" id="query" value="">
                        <span class="input-group-btn">
                            <button id="search_btn" class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
				        </span>
                    </div>
                </div>
            </div>

            <?php  if($num > 0){  ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr style="background-color: #337ab7; color: white; font-weight: bold">
                        <td>Cliente</td>
                        <td>Quantidade</td>
                        <td>Taxa</td>
                        <td>Total</td>
                        <td class="text-center">Status</td>
                        <td class="text-center">Ações</td>
                    </tr>
                </thead>
                <tbody>

                <?php do{ ?>

                <tr>
                    <td><?php echo buscaCliente($pedidos['cliente_id']); ?></td>
                    <td><?php echo $pedidos['quantidade_total']; ?></td>
                    <td><?php echo $pedidos['taxa_id'];   ?></td>
                    <td><?php echo "R$ ".Funcoes_auxiliares::formataValor($pedidos['total_pedido']);   ?></td>
                    <td class="text-center"><?php echo statusPedido($pedidos['situacao_pedido']);   ?></td>
                    <td class="text-center">
                        <a href="detalhes-pedido-<?php echo $pedidos['id']; ?>" class="label label-warning">DETALHES</a>
<!--                        <a href="" class="label label-danger">EXCLUIR</a>-->
                    </td>
                </tr>

                <?php }while($pedidos = $execute->fetch_assoc());  ?>

                </tbody>

            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="listar-pedidos-0" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for($i = 0; $i < $num_paginas; $i++){

                        $estilo = "";
                        if($pagina == $i)
                            $estilo = "class=\"active\"";
                        ?>
                    <li <?php echo $estilo;  ?> ><a href="listar-pedidos-<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                    <?php }  ?>

                    <li>
                        <a href="listar-pedidos-<?php echo $num_paginas-1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <?php } ?>

        </div>
    </div>
</div>
