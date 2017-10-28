<?php

class Pedido
{
    public $dados = [
        'cliente_id',
        'taxa_id',
        'quantidade_total',
        'total_pedido',
        'situacao_pedido'
    ];
    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function gravarPedido(){
        $sql = new Sql();
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $sql->query($query);
    }

    public function updatePedido(){

    }

    public function deletePedido(){

    }

    public function setCustoTotal($custoTotal)
    {
        $custoTotal = str_replace(',', '.', $custoTotal);
        $custoTotal = preg_replace('/[^\d,\.]/', '', $custoTotal);
        $custoTotal = round($custoTotal, 2);
        $this->dados['total_pedido'] = $custoTotal;
    }
}