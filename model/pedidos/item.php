
<?php

    require_once('../../inc/config_bd.php');
    //OU //include_once('../inc/config_bd.php');

    $sql = new Sql();
    $produtos = $sql->select("SELECT * FROM produto");

?>

    <tr class='produto'>
        <td>
            <label class='btn btn-primary indice' for='indice' name='indice'>1</label>
        </td>
        <td>
            <div class="product">
                <select class="selecionar" style="border-radius: 5px 5px 5px 5px; height: 32px; margin-top: 1px">
                    <option style="display: none" value=''>Escolha o produto</option>
                    <?php
                    foreach ($produtos as $key => $linha){
                        echo "<option class='item-option' id='" . $linha["id"] . "' data-tamanho='".$linha["tamanho"]."' value='".$linha["valor"]."'>" . $linha["produto"] . " - ".$linha["tamanho"]. "</option>\n";
                    }
                    ?>
                </select>
            </div>
        </td>
        <td>
            <input class="quantidade" type='number' style='width: 50px; margin-top: 1px; height: 32px' max='10' min='0' value="0">
        </td>
        <td>
            <div style='font-size: 18px; margin-top: 5px; text-align: left'>R$  <span class='preco'>0.0</span></div>
        </td>
        <td>
            <div style='font-size: 18px; margin-top: 5px; text-align: left'>R$  <span class='sub-total'>0.0</span></div>
        </td>
        <td>
            <button type='button' class='btn btn-danger remove' onclick='remover(this)'>REMOVER</button>
        </td>
    </tr>