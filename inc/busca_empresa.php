<?php

require '../inc/config_bd.php';
require '../inc/Funcoes_auxiliares.php';

$busca = $_POST['_cliente_nome'];
//$busca = "Serna";

$sql = new Sql();

$data = $sql->select("SELECT id, nome, cnpj FROM empresas WHERE nome LIKE '%".$busca."%' OR cnpj LIKE '%".$busca."%' LIMIT 10;");

//$clientes = retornaNomes($data);
$empresas = retornaDadosCompletos($data);


echo json_encode($empresas);


function retornaDadosCompletos($data){

    $lista_empresas = [];

    foreach ($data as $empresa){

        $temp = [
            "id",
            'nome',
            'cnpj'
        ];

        $temp["id"] =  $empresa['id'];

        $temp['nome'] = utf8_encode($empresa['nome']);

        $temp['cnpj'] = Funcoes_auxiliares::getCnjpFormatado($empresa['cnpj']);

        array_push($lista_empresas, $temp);
    }

    return $lista_empresas;
}

function setCnpj($cnpj)
{
    $this->attributes['cnpj'] = preg_replace('~.*(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})\-(\d{2}).*~', '$1$2$3$4$5', $cnpj);
}

?>