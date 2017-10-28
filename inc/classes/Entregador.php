<?php

class Entregador
{
    public $dados = [
        'empresa_id',
        'nome',
        'cpf',
        'rg',
        'celular'
    ];
    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function gravarEntregador(){
        $sql = new Sql();
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $sql->query($query);
    }

    public function updateEntregador(){

    }

    public function deleteEntregador(){

    }

    public function setCpf($cpf)
    {
        $this->dados['cpf'] = preg_replace('~.*(\d{3})\.(\d{3})\.(\d{3})\-(\d{2}).*~', '$1$2$3$4', $cpf);
    }

    public function setCelular($celular)
    {
        $this->dados['celular'] = preg_replace('~.*\((\d{2})\) (\d{5})\-(\d{4}).*~', '$1$2$3', $celular);
    }
}