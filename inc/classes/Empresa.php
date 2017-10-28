<?php

class Empresa{

    public $dados = [
        'nome',
        'cnpj',
        'email',
        'telefone',
        'cep',
        'cidade',
        'bairro',
        'logradouro',
        'numero_imovel',
        'complemento_endereco',
        'ponto_referencia'
    ];
    private $sql;

    public function __construct(){
        $this->sql = new Sql();
    }

    public function gravarEmpresa(){
        $sql = new Sql();
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $sql->query($query);
    }

    public function updateEmpresa(){

    }

    public function deleteEmpresa(){

    }

    public function setCnpj($cnpj)
    {
        $this->dados['cnpj'] = preg_replace('~.*(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})\-(\d{2}).*~', '$1$2$3$4$5', $cnpj);
    }

    public function setTelefone($telefone)
    {
        $this->dados['telefone'] = preg_replace('~.*\((\d{2})\) (\d{4})\-(\d{4}).*~', '$1$2$3', $telefone);
    }

    public function setCep($cep)
    {
        $this->dados['cep'] = preg_replace('~.*(\d{5})\-(\d{3}).*~', '$1$2', $cep);
    }
}