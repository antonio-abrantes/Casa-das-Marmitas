
<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';


$sql_code = "SELECT * FROM clientes WHERE id=".$id_cliente;

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$cliente = $execute->fetch_assoc();

$cliente = Funcoes_auxiliares::condificaStringsUTF8($cliente);

?>

<!-- Modal de confirmação exclusão -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">EXCLUIR CLIENTE</h4>
            </div>
            <div class="modal-body">Deseja realmente excluir este cliente?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>


<h3 class="page-header">Cliente Código Nº <span id="cliente-id"><?php echo $cliente['id']; ?></span> </h3>

<form method="POST" action="confirm-cad-cliente-true" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação alteração -->
    <div class="modal fade" id="updade-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAR ALTERAÇÕES</h4>
                </div>
                <div class="modal-body">Deseja alterar os dados deste cliente?</div>
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
            <input type="number" value="<?php echo $cliente['id']; ?>" name="id-cliente" id="id-cliente" hidden>
            <input class="form-control" maxlength="60" placeholder="Nome do cliente" name="nome" type="text" id="nome" value="<?php echo $cliente['nome']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-2 ">
            <label for="nascimento" class="control-label">Nascimento:</label>
            <input id="nascimento" class="form-control" placeholder="99/99/9999" maxlength="10" name="nascimento" type="date" value="<?php echo $cliente['nascimento']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="telefone" class="control-label">Telefone:</label>
            <input id="telefone" class="form-control" placeholder="(99) 9999-9999" maxlength="14" name="telefone" type="text" value="<?php echo Funcoes_auxiliares::formataTelefone($cliente['telefone']) ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2 ">
            <label for="cep" class="control-label">CEP:</label>
            <input id="cep" class="form-control" placeholder="99999-999" maxlength="10" onKeyPress="MascaraCep(form1.cep);" name="cep" type="text" value="<?php echo Funcoes_auxiliares::formataCep($cliente['cep']); ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="cidade" class="control-label">Cidade:</label>
            <input id="cidade" class="form-control" maxlength="60" placeholder="Nome da cidade" name="cidade" type="text" value="<?php echo $cliente['cidade']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="bairro" class="control-label">Bairro:</label>
            <input id="bairro" class="form-control" maxlength="60" placeholder="Nome do bairro" name="bairro" type="text" value="<?php echo $cliente['bairro']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-8 ">
            <label for="logradouro" class="control-label">Logradouro:</label>
            <input id="logradouro" class="form-control" maxlength="100" placeholder="Nome do logradouro" name="logradouro" type="text" value="<?php echo $cliente['logradouro']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="numero_residencial" class="control-label">N&uacute;mero:</label>
            <input id="numero_residencial" class="form-control" maxlength="30" placeholder="Número residencial" name="numero_residencial" type="text" value="<?php echo $cliente['numero_residencial']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="complemento_endereco" class="control-label">Complemento:</label>
            <input id="complemento_endereco" class="form-control" maxlength="30" placeholder="Complemento do endereço" name="complemento_endereco" type="text" value="<?php echo $cliente['complemento_endereco']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="ponto_referencia" class="control-label">Ponto de refer&ecirc;ncia:</label>
            <input id="ponto_referencia" class="form-control" maxlength="30" placeholder="Ponto de referência" name="ponto_referencia" type="text" value="<?php echo $cliente['ponto_referencia']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">
            <input class="btn btn-primary" data-toggle="modal" data-target="#updade-modal" type="button" value="Salvar">
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Deletar</button>
        </div>
    </div>
</form>


