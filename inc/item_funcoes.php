<?php

    require_once('config_bd.php');

    $data = $_GET["pedido"];

    $id_cliente = buscaCliente($data["id_cliente"]);
    $num_pedido = $data["num_pedido"];

    echo "Cliente: ".$id_cliente."\n";
    echo "Pedido nº ".$num_pedido."\n";

    if(isset($data['lista'][0])){  //Verifica se foi colocado algum item na lista

        $lista_itens_pedido = $data['lista'][0]; //Captura o array com a lista de pedidos

        foreach ($lista_itens_pedido as $item){
            echo "Item ID nº: ".$item['id_item'] ." - Qtd: ". $item['qtd_itens']."\n";
        }
    }else{
        echo "Sem pedidos na lista";
    }

function buscaCliente($dado){
    $sql = new Sql();

    return $dado;
}