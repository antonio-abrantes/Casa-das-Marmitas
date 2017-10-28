<?php

function buscaEmpresaNome($empresa_id){

    $sql = new Sql();
    $result = $sql->select("SELECT * FROM empresas WHERE id=".$empresa_id);
    $empresa = $result[0];

    foreach ($empresa as $key => $item){
        $empresa[$key] = utf8_encode($item);
    }

    return $empresa['nome'];
}

function buscaEntregadorNome($entregador_id){

    $sql = new Sql();
    $result = $sql->select("SELECT * FROM entregadores WHERE id=".$entregador_id);
    $entregador = $result[0];

    foreach ($entregador as $key => $item){
        $entregador[$key] = utf8_encode($item);
    }

    return $entregador['nome'];
}


function getQdtEntregas($entregador_id){

    $sql = new Sql();
    $result = $sql->select("SELECT e.id as codigo, e.nome as nome, e.celular as celular, e.cpf as cpf, COUNT(v.entregador_id) as total_entregas FROM entregadores e, entregas v WHERE e.id = v.entregador_id AND e.id=".$entregador_id);
    $entregador = $result[0];

    foreach ($entregador as $key => $item){
        $entregador[$key] = utf8_encode($item);
    }

    return $entregador;
}

function getQdtEntregasGeral($entregador_id, $data_inicio, $data_final){

    $sql = new Sql();
    $query = "SELECT e.id as codigo, e.nome as nome, e.celular as celular, e.cpf as cpf, COUNT(v.entregador_id) as total_entregas FROM entregadores e, entregas v WHERE e.id = v.entregador_id AND e.id=".$entregador_id." AND v.data_entrega >='".$data_inicio."'";

    if(strlen($data_final) != 0){
        $query .= " AND v.data_entrega <='".$data_final."';";
    }else{
        $query .= ";";
    }

    $result = $sql->select($query);
    $entregador = $result[0];

    foreach ($entregador as $key => $item){
        $entregador[$key] = utf8_encode($item);
    }

    return $entregador;
}

function cabecalhoDeDatas($data_inicio, $data_final){
    if(strlen($data_final) != 0 && $data_final != $data_inicio){
        echo "<h3 style='color: #1a1a1a; font-style: italic; font-weight: bold'>Data: ".Funcoes_auxiliares::getDataFormatada($data_inicio)." até ".Funcoes_auxiliares::getDataFormatada($data_final)."</h3>";
    }else{
        echo "<h3 style='color: #1a1a1a; font-style: italic; font-weight: bold'>Data: ".Funcoes_auxiliares::getDataFormatada($data_inicio);
    }
}

function buscaValorTotalPedido($pedido_id){
    $sql = new Sql();

    $result = $sql->select("SELECT * FROM pedidos WHERE id=".$pedido_id);

    $tamanho = $result[0];

    return $tamanho['total_pedido'];
}

function buscaTamanhoProduto($tamanho){
    $sql = new Sql();

    $result = $sql->select("SELECT * FROM tamanho_produtos WHERE id=".$tamanho);

    $tamanho = $result[0];

    return $tamanho['tamanho'];

}

function setCpf($cpf)
{
    $this->attributes['cpf'] = preg_replace('~.*(\d{3})\.(\d{3})\.(\d{3})\-(\d{2}).*~', '$1$2$3$4', $cpf);
}