
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
<h3 class="page-header">CADASTRO DE TAXA</h3>

<form method="POST" action="nova-taxa" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de pedido -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAÇÃO DE CADASTRO</h4>
                </div>
                <div class="modal-body">Deseja confirmar o cadastro desta taxa?</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="taxa" class="control-label">Valor:</label>
            <input class="form-control" placeholder="Valor da taxa" name="taxa" type="text" id="taxa">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-6 ">
            <label for="tipo_taxa" class="control-label">Tipo:</label>
            <select class="form-control" id="tipo_taxa" name="tipo_taxa"><option value="1">Atraso</option><option value="2" selected="selected">Entrega</option><option value="3">Extra</option></select>
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