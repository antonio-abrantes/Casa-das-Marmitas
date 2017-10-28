<?php

include 'inc/conexao.php';
include 'model/entregadores/funcoes_entregadores.php';
include 'inc/Funcoes_auxiliares.php';

$entregador_id = $id_entregador;

$data_inicio = "2017-10-02";
$data_final = date("Y-m-d");

if(strlen($data_inicio) != 0 && strlen($data_final) != 0){
    $sql_code = "SELECT * FROM entregas WHERE entregador_id=".$entregador_id." AND data_entrega >= '".$data_inicio."' AND data_entrega <= '".$data_final."';";
}elseif (strlen($data_inicio) != 0){
    $sql_code = "SELECT * FROM entregas WHERE entregador_id=" . $entregador_id . " AND data_entrega LIKE  '%" . $data_inicio . "%';";
}

$execute = $mysqli->query($sql_code) or die($mysqli->error);
$entregas = $execute->fetch_assoc();
$num_entregas = $mysqli->query($sql_code)->num_rows;

$nome_entregador = buscaEntregadorNome($entregador_id);

?>

<div class="container-fluid hidden-print" id="opcoes">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-6">
                    <h2>Relatório individual de entregas</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input class="btn btn-primary" type="button" id="listar-individual" value="LISTAR">
                        <input class="btn btn-success" type="button" id="imprimir" value="IMPRIMIR" onclick="window.print();">
                        <a href="listar-entregadores-0" class="btn btn-default" id="voltar">VOLTAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label class="" for="data-inicial">DATA INICIAL</label>
            <input type="date" min="2017-01-02" value="2017-10-02" id="data-inicial">
        </div>
        <div class="col-md-3" style="margin-left: 4px">
            <label class="" for="data-final">DATA FINAL</label>
            <input type="date" id="data-final" value="<?php echo date("Y-m-d"); ?>">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12" id="resultado" style="margin-top: 10px">
        <div class="col-sm-6">
            <h2 class="visible-print text-center" style="margin-bottom: 30px">Relatório individual de entregas</h2>
        </div>
        <h3>Nome: <span style="font-weight: bold"><?php echo $nome_entregador; ?> - Código Nº: <?php echo $entregador_id; ?></span></h3>
        <input type="text" name="entregador_id" id="entregador_id" value="<?php echo $entregador_id; ?>" hidden >
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
                        ?>
                    </td>
                </tr>
            <?php } while ($entregas = $execute->fetch_assoc()); ?>
            <tr>
                <td colspan="3">
                    <div class="pull-right" style="margin-right: 50px; font-size: 22px">
                        TOTAL DE ENTREGAS:
                        <span id="total-entregas" style="color: darkred"><?php echo $num_entregas; ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="pull-right" style="margin-right: 50px; font-weight: bold; font-size: 22px">
                        TOTAL DA COMISSÃO R$:
                        <span id="total-comissao"><?php echo Funcoes_auxiliares::formataValor($num_entregas * 4.50); ?></span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>