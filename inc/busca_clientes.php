<?php

require '../inc/config_bd.php';

$busca = $_POST['_cliente_nome'];

$sql = new Sql();

$data = $sql->select("SELECT id, nome, telefone FROM clientes WHERE nome LIKE '%".$busca."%' OR telefone LIKE '%".$busca."%' LIMIT 10;");

$clientes = retornaDadosCompletos($data);

echo json_encode($clientes);

function retornaDadosCompletos($data){

    $lista_clientes = [];

    foreach ($data as $cliente){

    $temp = [
        "id",
        'nome',
        'telefone'
    ];

        $temp["id"] =  $cliente['id'];

        $temp['nome'] = utf8_encode($cliente['nome']);

        $temp['telefone'] = getTelefoneFormatado($cliente['telefone']);

        array_push($lista_clientes, $temp);
    }

    return $lista_clientes;
}


function getTelefoneFormatado($telefone)
{
    if($telefone == null)
        return null;
    return preg_replace('~.*(\d{2})(\d{4})(\d{4}).*~', '($1) $2-$3', $telefone);
}

function setTelefoneFormatado($telefone)
{
    return " < " . preg_replace('~.*\((\d{2})\) (\d{4})\-(\d{4}).*~', '$1$2$3', $telefone) . " >";
}

?>