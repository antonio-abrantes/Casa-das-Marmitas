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

<h3 class="page-header">CADASTRO DE CLIENTE</h3>

<form method="POST" action="confirm-cad-cliente-true" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de pedido -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAÇÃO DE CADASTRO</h4>
                </div>
                <div class="modal-body">Deseja confirmar o cadastro deste cliente?</div>
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
            <input class="form-control" maxlength="60" placeholder="Nome do cliente" name="nome" type="text" id="nome">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-2 ">
            <label for="nascimento" class="control-label">Nascimento:</label>
            <input id="nascimento" class="form-control" placeholder="99/99/9999" maxlength="10" name="nascimento" type="date">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="telefone" class="control-label">Telefone:</label>
            <input id="telefone" class="form-control" placeholder="(99) 9999-9999" maxlength="14" name="telefone" type="text">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2 ">
            <label for="cep" class="control-label">CEP:</label>
            <input id="cep" class="form-control" placeholder="99999-999" maxlength="10" onKeyPress="MascaraCep(form1.cep);" name="cep" type="text">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="cidade" class="control-label">Cidade:</label>
            <input id="cidade" class="form-control" maxlength="60" placeholder="Nome da cidade" name="cidade" type="text">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="bairro" class="control-label">Bairro:</label>
            <input id="bairro" class="form-control" maxlength="60" placeholder="Nome do bairro" name="bairro" type="text">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-8 ">
            <label for="logradouro" class="control-label">Logradouro:</label>
            <input id="logradouro" class="form-control" maxlength="100" placeholder="Nome do logradouro" name="logradouro" type="text">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="numero_residencial" class="control-label">N&uacute;mero:</label>
            <input id="numero_residencial" class="form-control" maxlength="30" placeholder="Número residencial" name="numero_residencial" type="text">
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="complemento_endereco" class="control-label">Complemento:</label>
            <input id="complemento_endereco" class="form-control" maxlength="30" placeholder="Complemento do endereço" name="complemento_endereco" type="text">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="ponto_referencia" class="control-label">Ponto de refer&ecirc;ncia:</label>
            <input id="ponto_referencia" class="form-control" maxlength="30" placeholder="Ponto de referência" name="ponto_referencia" type="text">
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

<?php


?>