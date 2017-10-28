<?php

include 'config_bd.php';
include 'conexao.php';
include '../model/entregadores/funcoes_entregadores.php';
include 'Funcoes_auxiliares.php';

$data_inicio = $_POST['data_incial'];
$data_final = $_POST['data_final'];

//var_dump(getQdtEntregasGeral("3", $data_inicio, $data_final));

$sql_code = "SELECT id FROM entregadores;";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$entregador = $execute->fetch_assoc();

?>

    <div class="col-sm-6">
        <h2 class="visible-print text-center" style="margin-bottom: 30px">Relatório geral de entregadores</h2>
    </div>
    <div id="data-intervalo">
        <?php cabecalhoDeDatas($data_inicio, $data_final); ?>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr style="background-color: #337ab7; color: white; font-weight: bold">
            <td>Código</td>
            <td>Entregador</td>
            <td>Contato</td>
            <td class="text-center">Qtd. Entregas</td>
            <td class="text-center">Comissão</td>
            <td class="text-center hidden-print">Ações</td>
        </tr>
        </thead>
        <tbody>

        <?php

            $num_entregas = 0;

            while ($entregador = $execute->fetch_assoc()) {

            $entregas = getQdtEntregasGeral($entregador['id'], $data_inicio, $data_final);

            if ($entregas['total_entregas'] == 0) {
                continue;
            }else{
                $comissao = $entregas['total_entregas'] * 4.50;
                $num_entregas += $entregas['total_entregas'];
                ?>
                <tr>
                    <td><?php echo $entregas['codigo']; ?></td>
                    <td><?php echo $entregas['nome']; ?></td>
                    <td><?php echo Funcoes_auxiliares::formataTelefone($entregas['celular']); ?></td>
                    <td class="text-center"><?php echo $entregas['total_entregas']; ?></td>
                    <td class="text-center"><?php
                        echo "R$ " . Funcoes_auxiliares::formataValor($comissao);
                        ?>
                    </td>
                    <td class="text-center hidden-print">
                        <a href="relatorio-individual-<?php echo $entregador['id']; ?>" class="label label-warning">DETALHES</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        <tr>
            <td colspan="6">
                <div class="pull-right" style="margin-right: 50px; font-size: 22px">
                    TOTAL GERAL DE ENTREGAS:
                    <span id="total-entregas" style="color: darkred"><?php echo $num_entregas; ?></span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="pull-right" style="margin-right: 50px; font-weight: bold; font-size: 22px">
                    TOTAL DAS COMISSÕES  R$:
                    <span id="total-comissao"><?php echo Funcoes_auxiliares::formataValor($num_entregas * 4.50); ?></span>
                </div>
            </td>
        </tr>

        </tbody>

    </table>