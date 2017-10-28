<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>CADASTRO DE PEDIDO - Nº <span id="num_pedido"><?php echo floatval($novo_pedido['novo_pedido']) + 1; ?></span></h3>
        </div>
        <form class="form-horizontal" method="POST" action="listar-pedidos-0" id="form-pedido" >

            <!-- Modal de confirmação de pedido -->
            <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">CONFIRMAÇÃO DE PEDIDO</h4>
                        </div>
                        <div class="modal-body">Deseja confirmar este pedido?</div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de cancelamento de pedido -->
            <div class="modal fade" id="cancel-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">CONFIRMAR CANCELAMENTO</h4>
                        </div>
                        <div class="modal-body">
                            Deseja cancelar o pedido?<br>
                            Todos os dados não cadastrados serão perdidos!
                        </div>
                        <div class="modal-footer">
<!--                            <button type="submit" class="btn ">Sim</button>-->
                            <a href="javascript:history.back()" class="btn btn-primary">Sim</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cliente_nome" class="control-label col-sm-2">Cliente:</label>
                        <div class="col-sm-10">
                        <input id="cliente_nome" data-idcliente="" class="form-control ui-widget" placeholder="Nome do cliente" name="cliente_nome" type="text">
                            <input type="hidden" id="cliente_id" name="cliente_id" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nome">R$:</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>Escolha uma forma de pagamento</option>
                                <option>Dinheiro</option>
                                <option>Crédito</option>
                                <option>Débito</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for="valor-pago">Valor pago: </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="valor-pago" placeholder="Digite o valor" name="valor-pago">
                        </div>

                        <label class="control-label col-sm-3" for="troco">Valor do troco: </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="troco" placeholder="Digite o valor" name="nome">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="desconto">Desconto:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="desconto" placeholder="Total Desconto :"
                                   name="nome">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="motivo-desconto">Motivo:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="motivo-desconto" placeholder="Digite o motivo do desconto:"
                                   name="nome">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="taxa">Taxa:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="taxa" value="4.50" disabled>
                        </div>
                        <label class="control-label col-sm-4" for="total">Total a pagar:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="total" value="" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group pull-right">
                        <button id="finalizar" type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm-modal" style="">Finalizar Pedido</button>
                        <button type="button" class="btn btn-default" style="">Limpar</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Inicio da parte dos itens -->
        <div id="pedidos" class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-inverse">
                    <tr style="background: #55595c; color: white;">
                        <th>Item</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Unit.</th>
                        <th>Sub Total</th>
                        <th style="padding-left: 40px">Ação</th>
                    </tr>
                    </thead>
                    <tbody id="list-produtos">

                    <!-- LOCAL A SEREM INSERIDAS AS LINHAS DOS PEDIDOS -->


                    </tbody>
                </table>
                <div>
                    <button id="add-item" class="btn btn-primary">ADD ITEM</button>

                    <input class="btn btn-default" data-toggle="modal" data-target="#cancel-modal" type="button" value="Cancelar">


                    <button id="json-item" class="btn btn-warning">TESTE</button>

                </div>
            </div>
        </div>

        <!-- FIM da parte dos itens -->
    </div>
</div>