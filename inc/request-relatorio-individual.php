<?php

include 'config_bd.php';
include 'conexao.php';
include '../model/entregadores/funcoes_entregadores.php';
include 'Funcoes_auxiliares.php';

$entregador_id = $_POST['entregador_id'];
$data_inicio = $_POST['data_incial'];
$data_final = $_POST['data_final'];

$sql_code = "";


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


    <div class="col-sm-6">
        <h2 class="visible-print text-center" style="margin-bottom: 30px">Relatório individual de entregas</h2>
    </div>
    <h3>Nome: <span style="font-weight: bold"><?php echo $nome_entregador; ?> - Código Nº: <?php echo $entregador_id; ?></span></h3>
    <div id="data-intervalo">
        <?php cabecalhoDeDatas($data_inicio, $data_final); ?>
    </div>
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