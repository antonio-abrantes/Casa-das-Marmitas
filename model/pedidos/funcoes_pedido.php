<?php

function buscaCliente($cliente_id){

    $sql = new Sql();

    $result = $sql->select("SELECT * FROM clientes WHERE id=".$cliente_id);

    $cliente = $result[0];

    return utf8_encode($cliente['nome']);
}

function statusPedido($situacao_pedido){

    if($situacao_pedido == 1)
        return  "<span class='label label-warning label-lg' >Pendente</span>";
    if($situacao_pedido == 2)
        return "<span class='label label-info label-lg' >Em trânsido</span>";
    if($situacao_pedido == 3)
        return "<span class='label label-success label-lg' >Entregue</span>";
    if($situacao_pedido == 4)
        return "<span class='label label-danger label-lg' >Cancelado</span>";
}


function buscaProdudo($produto_id){

    $sql = new Sql();
    $result = $sql->select("SELECT * FROM produtos WHERE id=".$produto_id);
    $produto = $result[0];

    foreach ($produto as $key => $item){
        $produto[$key] = utf8_encode($item);
    }

    $produto['tamanho'] = buscaTamanhoProduto($produto['tamanho']);

    return $produto;
}

function buscaTamanhoProduto($tamanho){
    $sql = new Sql();

    $result = $sql->select("SELECT * FROM tamanho_produtos WHERE id=".$tamanho);

    $tamanho = $result[0];

    return $tamanho['tamanho'];

}