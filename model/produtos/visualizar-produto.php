
<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';

$sql_code = "SELECT * FROM produtos WHERE id=".$id_produto;

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$produto = $execute->fetch_assoc();

$produto = Funcoes_auxiliares::condificaStringsUTF8($produto);

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

<h3 class="page-header">Produto Código Nº <span id="id-produto"><?php echo $produto['id']; ?></span></h3>

<form method="POST" action="confirm-cad-produto-true" accept-charset="UTF-8"><input name="_token" type="hidden" value="">

    <!-- Modal de confirmação de alteração -->
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">CONFIRMAR ALTERAÇÕES</h4>
                </div>
                <div class="modal-body">Deseja realmente alterar este produto?</div>
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
            <input type="number" value="<?php echo $produto['id']; ?>" name="id-produto" id="id-produto" hidden>
            <input class="form-control" maxlength="60" placeholder="Nome da marmita" name="nome" type="text" id="nome" value="<?php echo $produto['nome']; ?>">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group col-md-2 ">
            <label for="custo" class="control-label">Custo R$:</label>
            <input id="custo" class="form-control" placeholder="Custo da marmita" name="custo" type="text" value="<?php echo Funcoes_auxiliares::formataValor($produto['custo']); ?>">
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="tamanho" class="control-label">Tamanho:</label>
            <select class="form-control" id="tamanho" name="tamanho">
                <?php
                    for ($i = 1; $i <= 3; $i++){
                        if($produto["tamanho"] == $i+1){
                            echo "<option selected value=".$produto['tamanho'].">".Funcoes_auxiliares::buscaTamanhoProduto($produto['tamanho'])."</option>";
                        }else{
                            echo "<option value=".$i.">".Funcoes_auxiliares::buscaTamanhoProduto($i)."</option>";
                        }
                    }
                ?>
            </select>
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12 ">
            <label for="ingredientes" class="control-label">Ingredientes:</label>
            <textarea class="form-control" placeholder="Ingredientes da marmita" name="ingredientes" cols="50" rows="10" id="ingredientes"><?php echo $produto['ingredientes']; ?></textarea>
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button" data-toggle="modal" data-target="#update-modal" value="Salvar" da>
            <a href="javascript:history.back()" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>
