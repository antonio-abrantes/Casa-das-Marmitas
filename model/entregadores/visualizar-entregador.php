
<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';
include 'funcoes_entregadores.php';

$sql_code = "SELECT * FROM entregadores WHERE id=".$id_entregador;

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$entregador = $execute->fetch_assoc();

$entregador = Funcoes_auxiliares::condificaStringsUTF8($entregador);

?>

<h3 class="page-header">Entregador Código Nº <span id=""><?php echo $entregador['id']; ?></span></h3>

<form method="POST" action="confirm-cad-entregadores-true" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de alteração de cadastro -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAR ALTERAÇÕES</h4>
                </div>
                <div class="modal-body">Deseja confirmar as alterações no cadastro deste entregador?</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="nome" class="control-label">Nome:</label>
            <input type="number" value="<?php echo $entregador['id']; ?>" name="id-entregador" id="id-entregador" hidden>
            <input class="form-control" maxlength="60" placeholder="Nome do entregador" name="nome" type="text" id="nome" value="<?php echo $entregador['nome']; ?>">
            <div class="help-block with-errors"></div>
        </div>


        <div class="form-group col-md-6">
            <label for="empresa_nome" class="control-label">Empresa:</label>
            <input id="empresa_nome" data-idcliente="" class="form-control ui-widget" placeholder="Nome da empresa" name="empresa_nome" type="text" value="<?php echo buscaEmpresaNome($entregador['empresa_id']); ?>">
            <div class="help-block with-errors"></div>
            <input type="hidden" id="empresa_id" name="empresa_id" value="<?php echo $entregador['id']; ?>">
        </div>


    </div>
    <div class="row">
        <div class="form-group col-md-4 ">
            <label for="celular" class="control-label">Celular:</label>
            <input id="celular" class="form-control" placeholder="(99) 99999-9999" maxlength="15" name="celular" type="text" value="<?php echo Funcoes_auxiliares::formataTelefone($entregador['celular']); ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="cpf" class="control-label">CPF:</label>
            <input id="cpf" class="form-control" placeholder="999.999.999-99" maxlength="14" name="cpf" type="text" value="<?php echo Funcoes_auxiliares::getCpfFormatado($entregador['cpf']); ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="rg" class="control-label">RG:</label>
            <input id="rg" class="form-control" placeholder="99999999" maxlength="10" name="rg" type="text" value="<?php echo $entregador['rg']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button"  data-toggle="modal" data-target="#confirm-modal" value="Salvar">
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>

        </div>
    </div>
</form>
