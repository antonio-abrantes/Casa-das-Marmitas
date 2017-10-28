
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

<h3 class="page-header">CADASTRO DE PRODUTO</h3>

<form method="POST" action="listar-produtos-0" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de pedido -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAÇÃO DE CADASTRO</h4>
                </div>
                <div class="modal-body">Deseja confirmar o cadastro deste produto?</div>
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
            <input class="form-control" maxlength="60" placeholder="Nome da marmita" name="nome" type="text" id="nome">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group col-md-2 ">
            <label for="custo" class="control-label">Custo:</label>
            <input id="custo" class="form-control" placeholder="Custo da marmita" name="custo" type="text">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="tamanho" class="control-label">Tamanho:</label>
            <select class="form-control" id="tamanho" name="tamanho"><option value="1">Grande</option><option value="2">Média</option><option value="3">Pequena</option></select>
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 ">
            <label for="ingredientes" class="control-label">Ingredientes:</label>
            <textarea class="form-control" placeholder="Ingredientes da marmita" name="ingredientes" cols="50" rows="10" id="ingredientes"></textarea>
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