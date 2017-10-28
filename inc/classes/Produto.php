<?php

class Produto
{
    public $dados = [
        'nome',
        'ingredientes',
        'custo',
        'tamanho'
    ];

    private $sql;

    public function __construct(){
       $this->sql = new Sql();
    }

    public function gravarProduto(){
        $query = "INSERT INTO clientes (user_id,nome,nascimento,telefone,cep,cidade,bairro,logradouro,numero_residencial,complemento_endereco,ponto_referencia,created_at,updated_at) VALUES (6,'".$this->dados['nome']."','".$this->dados['nascimento']."','".$this->dados['telefone']."','".$this->dados['cep']."','".$this->dados['cidade']."','".$this->dados['logradouro']."','Av. Fátima','65',null,null,'2016-12-05 09:14:27.0','2016-12-05 09:14:27.0');";
        $this->sql->query($query);
    }

    public function updateProduto(){

    }

    public function deleteProduto(){

    }

    public function setCusto($custo)
    {
        $custo = str_replace(',', '.', $custo);
        $custo = preg_replace('/[^\d,\.]/', '', $custo);
        $custo = round($custo, 2);
        $this->attributes['custo'] = $custo;
    }
    public function getCustoByQuantidade($quantidade)
    {
        $custo = $this->attributes['custo'];
        if($custo == null)
            return null;
        $custo *= $quantidade;
        return "R$".number_format($custo, 2, ',', '.');
    }

    public function getTamanho()
    {
        $tamanho = null;
        switch ($this->attributes['tamanho']) {
            case 1:
                $tamanho = "Grande";
                break;
            case 2:
                $tamanho = "Média";
                break;
            case 3:
                $tamanho = "Pequena";
                break;
            default:
                break;
        }
        return $tamanho;
    }
}