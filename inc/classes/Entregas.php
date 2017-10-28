<?php

class Entregas
{
    public $dados = [
        'entregador_id',
        'pedido_id',
        'status_id',
        'data_entrega'
    ];
    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function gravarEntrega(){
        $sql = new Sql();
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $sql->query($query);
    }

    public function updateEntrega(){

    }

    public function deleteEntrega(){

    }

}