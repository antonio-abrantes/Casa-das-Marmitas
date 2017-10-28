<?php

include 'inc/conexao.php';
include 'model/entregadores/funcoes_entregadores.php';
include 'inc/Funcoes_auxiliares.php';

$sql_code = "SELECT id FROM entregadores;";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$entregador = $execute->fetch_assoc();

?>
<div class="container-fluid hidden-print" id="opcoes">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-6">
                    <h2>Relatório geral de entregas</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input class="btn btn-primary" type="button" id="listar-geral" value="LISTAR">
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
            <h2 class="visible-print text-center" style="margin-bottom: 30px">Relatório geral de entregadores</h2>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr style="background-color: #337ab7; color: white; font-weight: bold">
                <td>Código</td>
                <td>Entregador</td>
                <td>Contato</td>
                <td class="text-center">Qtd. Entregas</td>
                <td class="text-center">Comissão</td>
                <td class="text-center hidden-print" >Ações</td>
            </tr>
            </thead>
            <tbody>

            <?php

                $num_entregas = 0;

                while ($entregador = $execute->fetch_assoc()) {

                $entregas = getQdtEntregas($entregador['id']);


                if ($entregas['total_entregas'] == 0) {
                    continue; ?>
<!--                    <td colspan="3" class="text-center">-->
<!--                        <h3>--><?php //echo "Nenhuma entrega para os parametros informados"; ?><!--</h3></td> --><?php
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
    </div>
</div>