
<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';

$sql_code = "SELECT * FROM empresas WHERE id=".$id_empresa;

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$empresa = $execute->fetch_assoc();

$empresa = Funcoes_auxiliares::condificaStringsUTF8($empresa);

?>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body">Deseja realmente excluir este item?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>

<h3 class="page-header">Empresa Código Nº <span id=""></span><?php echo $empresa['id']; ?></h3>

<form method="POST" action="confirm-cad-empresa-true" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de alteração de cadastro -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAR ALTERAÇÕES</h4>
                </div>
                <div class="modal-body">Deseja confirmar as alterações no cadastro desta empresa?</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-4 ">
            <label for="nome" class="control-label">Nome:</label>
            <input type="number" value="<?php echo $empresa['id']; ?>" name="id-empresa" id="id-empresa" hidden>
            <input class="form-control" maxlength="60" placeholder="Nome da empresa" name="nome" type="text" id="nome" value="<?php echo $empresa['nome']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-2 ">
            <label for="cnpj" class="control-label">CNPJ:</label>
            <input id="cnpj" class="form-control" placeholder="99.999.999/9999-99" maxlength="18" name="cnpj" type="text" value="<?php echo Funcoes_auxiliares::getCnjpFormatado($empresa['cnpj']); ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="email" class="control-label">E-mail:</label>
            <input class="form-control" maxlength="50" placeholder="E-mail da empresa" name="email" type="text" id="email" value="<?php echo $empresa['email']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-2 ">
            <label for="telefone" class="control-label">Telefone:</label>
            <input id="telefone" class="form-control" placeholder="(99) 9999-9999" maxlength="14" name="telefone" type="text" value="<?php echo Funcoes_auxiliares::formataTelefone($empresa['nome']); ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2 ">
            <label for="cep" class="control-label">CEP:</label>
            <input id="cep" class="form-control" placeholder="99999-999" maxlength="10" name="cep" type="text" value="<?php echo Funcoes_auxiliares::formataCep($empresa['cep']); ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="cidade" class="control-label">Cidade:</label>
            <input id="cidade" class="form-control" maxlength="60" placeholder="Nome da cidade" name="cidade" type="text" value="<?php echo $empresa['cidade']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="bairro" class="control-label">Bairro:</label>
            <input id="bairro" class="form-control" maxlength="60" placeholder="Nome do bairro" name="bairro" type="text" value="<?php echo $empresa['bairro']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-8 ">
            <label for="logradouro" class="control-label">Logradouro:</label>
            <input id="logradouro" class="form-control" maxlength="100" placeholder="Nome do logradouro" name="logradouro" type="text" value="<?php echo $empresa['logradouro']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="numero_imovel" class="control-label">N&uacute;mero:</label>
            <input id="numero_imovel" class="form-control" maxlength="30" placeholder="Número do imóvel" name="numero_imovel" type="text" value="<?php echo $empresa['numero_imovel']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="complemento_endereco" class="control-label">Complemento:</label>
            <input id="complemento_endereco" class="form-control" maxlength="30" placeholder="Complemento do endereço" name="complemento_endereco" type="text" value="<?php echo $empresa['complemento_endereco']; ?>">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="ponto_referencia" class="control-label">Ponto de refer&ecirc;ncia:</label>
            <input id="ponto_referencia" class="form-control" maxlength="30" placeholder="Ponto de referência" name="ponto_referencia" type="text" value="<?php echo $empresa['ponto_referencia']; ?>">
            <div class="help-block with-errors"></div>
        </div>
    </div>


    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirm-modal" value="Salvar">
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>
