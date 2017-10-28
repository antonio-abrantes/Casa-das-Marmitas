
<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';
include 'funcoes_pedido.php';


$sql_code = "SELECT * FROM pedidos WHERE id=".$id_pedido;

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$pedido = $execute->fetch_assoc();

$cliente = buscaCliente($pedido['cliente_id']);
//echo $pedido['cliente_id'];

?>

<!-- Modal de confirmação -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">CANCELAR PEDIDO</h4>
            </div>
            <div class="modal-body">Deseja realmente cancelar esse pedido?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>DETALHES DO PEDIDO Nº <span id="num_pedido"><?php echo $id_pedido; ?> - STATUS:
            <?php echo statusPedido($pedido['situacao_pedido']); ?></h3>
        </div>
        <form class="form-horizontal" action="confirm-cad-pedido-true" method="POST" id="form-pedido">

            <!-- Modal de confirmação de alteração -->
            <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">CONFIRMAR ALTERAÇÕES</h4>
                        </div>
                        <div class="modal-body">Deseja realmente alterar este pedido?</div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sim</button>
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
                            <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $pedido['cliente_id']; ?>">
                            <input id="cliente_nome" data-idcliente="<?php echo $pedido['cliente_id']; ?>" class="form-control" placeholder="Nome do cliente" name="cliente_nome" type="text" value="<?php echo $cliente; ?>">
                            <input type="number" value="<?php echo $id_pedido; ?>" name="id-pedido" id="id-pedido" hidden>
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
                        <label class="control-label col-sm-4" for="nome">Total a pagar:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="total" value="<?php //echo number_format((float)$pedido['total_pedido'], 2, ',', '.'); ?>" name="nome" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group pull-right">
                        <button id="finalizar" type="submit" class="btn btn-success" style="" disabled >Finalizar Pedido</button>
                        <button type="button" class="btn btn-default" style="" disabled >Limpar</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Inicio da parte dos itens -->
        <div id="pedidos" class="row" >
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

                    <?php

                    $custo_total = 0.0;

                        $sql = new Sql();

                        $result = $sql->select("SELECT * FROM pedido_itens WHERE pedido_id=".$id_pedido);

                        //Pega todos os itens de um determinado pedido
                        $pedido_itens = $result;

                        foreach ($pedido_itens as $item){

                            //Localiza a referencia de cada produto presente na lista de itens
                            $produto = buscaProdudo($item['produto_id']);

                            $custo = floatval($produto['custo']);
                            $custo_total += $custo;

                            ?>

                            <!-- INICIO DO LOOP DA TABELA -->

                            <tr class='produto'>
                                <td>
                                    <label class='btn btn-primary indice' for='indice' name='indice'>1</label>
                                </td>
                                <td>
                                    <div class="product">
                                        <select class="selecionar" style="border-radius: 5px 5px 5px 5px; height: 32px; margin-top: 1px">

                                                <option class='item-option' id='<?php echo $produto['id']; ?>"' data-tamanho='<?php echo $produto['tamanho']; ?>' value='<?php echo $produto['custo']; ?>'><?php echo $produto['nome']." - ".utf8_encode($produto['tamanho']); ?></option>

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input readonly class="quantidade" type='number' style='width: 50px; margin-top: 1px; height: 32px' max='10' min='0' value="<?php echo $item['quantidade']; ?>">
                                </td>
                                <td>
                                    <div style='font-size: 18px; margin-top: 5px; text-align: left'>R$  <span class='preco'><?php echo number_format((float)$custo, 2, '.', '.'); ?></span></div>
                                </td>
                                <td>
                                    <div style='font-size: 18px; margin-top: 5px; text-align: left'>R$  <span class='sub-total'><?php

                                                $sub_total = (float)$custo * (float)$item['quantidade'];
                                                echo "R$ ".number_format((float)$sub_total, 2, '.', '.');
                                            ?></span></div>
                                </td>
                                <td>
                                    <button type='button' class='btn btn-danger remove' disabled onclick='remover(this)'>REMOVER</button>
                                </td>
                            </tr>

                            <!-- INICIO DO LOOP DA TABELA -->

                      <?php  } ?>


                    </tbody>
                </table>
                <div>

<!--                    <button id="add-item" class="btn btn-warning-lg" disabled >ADD ITEM</button>-->
<!---->
<!--                    <button id="json-item" class="btn btn-warning" hidden >TESTE</button>-->

                    <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#update-modal" value="Salvar" da>

                    <a href="javascript:history.back()" class="btn btn-default">VOLTAR</a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">CANCELAR</button>

                </div>
            </div>
        </div>

        <!-- FIM da parte dos itens -->
    </div>
</div>
