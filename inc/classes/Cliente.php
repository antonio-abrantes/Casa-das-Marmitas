<?php

class Cliente {
    public $dados = [
        'nome',
        'nascimento',
        'telefone',
        'cep',
        'cidade',
        'bairro',
        'logradouro',
        'numero_residencial',
        'complemento_endereco',
        'ponto_referencia'
    ];

    public function gravarCliente(){
        $sql = new Sql();
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $sql->query($query);
    }

    public function updateCliente(){

    }

    public function deleteCliente(){

    }

    public function setNascimento($nascimento)
    {
        $this->dados['nascimento'] = preg_replace('~.*(\d{2})\/(\d{2})\/(\d{4}).*~', '$3-$2-$1', $nascimento);
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