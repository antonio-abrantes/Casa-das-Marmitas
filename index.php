<?php
require 'inc/config_bd.php';
require 'inc/Slim-2.x/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// Rota para pagina inicial
$app->get(
    '/',
    function () {
        require_once("view/index.php");
    }
);

//Rota para pagina de cadastro de novos clientes
$app->get(
    '/novo-cliente',
    function () {
        require_once("view/novo-cliente.php");
    }
);

//Rota para listar clientes
$app->get(
    '/listar-clientes-:pagina',
    function ($pagina) {

        require_once("view/listagens/list-cliente.php");
    }
);

//Rota detalhar um determinado cliente
$app->get(
    '/detalhes-cliente-:id_cliente',
    function ($id_cliente) {
        require_once("view/detalhes/detalhes-cliente.php");
    }
);

//Rata para confirmar cadastro de cliente
$app->POST(
    '/confirm-cad-cliente-:confirmado',
    function ($confirmado) {
        require 'inc/classes/Cliente.php';
        $cliente = new Cliente();
        $cliente->dados['nome'] = $_POST['nome'];
        $cliente->setNascimento( $_POST['nascimento']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->dados['cidade'] = $_POST['cidade'];
        $cliente->setCep($_POST['cep']);
        $cliente->dados['logradouro'] = $_POST['logradouro'];

        if(isset($confirmado) && $confirmado == true){

            if(isset($_POST['nome']) && empty($_POST['nome']) == false){
                $cliente->gravarCliente();
            }
            echo "<meta http-equiv='Refresh' content='2;URL=listar-clientes-0'>";
        }
    }
);

//Rota para alteração de cadastro de cliente
$app->POST(
    '/confirm-update-cliente-:confirmado',
    function ($confirmado) {
        require 'inc/classes/Cliente.php';
        $cliente = new Cliente();
        $cliente->dados['cliente_id'] = $_POST['cliente_id'];
        $cliente->dados['nome'] = $_POST['nome'];
        $cliente->setNascimento( $_POST['nascimento']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->dados['cidade'] = $_POST['cidade'];
        $cliente->setCep($_POST['cep']);
        $cliente->dados['logradouro'] = $_POST['logradouro'];

        if(isset($confirmado) && $confirmado == true){

            if(isset($_POST['nome']) && empty($_POST['nome']) == false){
                $cliente->updateCliente();
            }
            echo "<meta http-equiv='Refresh' content='2;URL=listar-clientes-0'>";
        }
    }
);

//Rota para excluir um cliente
$app->POST(
    '/confirm-delete-cliente-:confirmado',
    function ($confirmado) {
        require 'inc/classes/Cliente.php';
        $cliente = new Cliente();
        $cliente->dados['cliente_id'] = $_POST['cliente_id'];

        if(isset($confirmado) && $confirmado == true){

            if(isset($_POST['nome']) && empty($_POST['nome']) == false){
                $cliente->deleteCliente();
            }
            echo "<meta http-equiv='Refresh' content='2;URL=listar-clientes-0'>";
        }
    }
);

//Rota para cadastro de novos pedidos
$app->get(
    '/novo-pedido',
    function () {
        $sql = new Sql();
        $result = $sql->select('SELECT MAX(id) as novo_pedido FROM pedidos;');
        $novo_pedido = $result[0];
        require_once("view/novo-pedido.php");
    }
);

//Rota para listar pedidos
$app->get(
    '/listar-pedidos-:pagina',
    function ($pagina) {
        require_once("view/listagens/list-pedidos.php");
    }
);

//Rota detalhar um determinado pedido
$app->get(
    '/detalhes-pedido-:id_pedido',
    function ($id_pedido) {
        require_once("view/detalhes/detalhes-pedido.php");
    }
);

//Rota para redirecionamento após alteração
$app->POST(
    '/confirm-cad-pedido-:confirmado',
    function ($confirmado) {
        if(isset($confirmado) && $confirmado == true){
            echo "<meta http-equiv='Refresh' content='0;URL=listar-pedidos-0'>";
        }
    }
);

//Rota para cadastro de novos produtos
$app->get(
    '/novo-produto',
    function () {
        require_once("view/novo-produto.php");
    }
);

//Rota para listar produtos
$app->get(
    '/listar-produtos-:pagina',
    function ($pagina) {
        require_once("view/listagens/list-produtos.php");
    }
);

//Rota detalhar um determinado produto
$app->get(
    '/detalhes-produto-:id_produto',
    function ($id_produto) {
        require_once("view/detalhes/detalhes-produto.php");
    }
);

//Rota para redirecionamento após produto
$app->POST(
    '/confirm-cad-produto-:confirmado',
    function ($confirmado) {
        if(isset($confirmado) && $confirmado == true){
            echo "<meta http-equiv='Refresh' content='0;URL=listar-produtos-0'>";
        }
    }
);

//Rota para cadastro de novas empresas
$app->get(
    '/nova-empresa',
    function () {
        require_once("view/nova-empresa.php");
    }
);

//Rota para listar empresas
$app->get(
    '/listar-empresas-:pagina',
    function ($pagina) {
        require_once("view/listagens/list-empresas.php");
    }
);

//Rota detalhar uma determinada empresa
$app->get(
    '/detalhes-empresa-:id_empresa',
    function ($id_empresa) {
        require_once("view/detalhes/detalhes-empresa.php");
    }
);

//Rota para redirecionamento após cadastro/alteração de empresa
$app->POST(
    '/confirm-cad-empresa-:confirmado',
    function ($confirmado) {
        if(isset($confirmado) && $confirmado == true){

            echo "<meta http-equiv='Refresh' content='0;URL=listar-empresas-0'>";

        }
    }
);

//Rota para cadastro de novos entregadores
$app->get(
    '/novo-entregador',
    function () {
        require_once("view/novo-entregador.php");
    }
);

//Rota para listar entregadores
$app->get(
    '/listar-entregadores-:pagina',
    function ($pagina) {
        require_once("view/listagens/list-entregadores.php");
    }
);

//Rota detalhar um determinado entregador
$app->get(
    '/detalhes-entregador-:id_entregador',
    function ($id_entregador) {
        require_once("view/detalhes/detalhes-entregador.php");
    }
);

//Rota para redirecionamento após cadastro/alteração de entregadores
$app->get(
    '/confirm-cad-entregadores-:confirmado',
    function ($confirmado) {
        if(isset($confirmado) && $confirmado == true){

            echo "<meta http-equiv='Refresh' content='0;URL=listar-entregadores-0'>";
        }
    }
);

//Rota relatorio geral entregadores
$app->get(
    '/relatorio-geral',
    function () {
        require_once("view/relatorio-geral.php");
    }
);

//Rota relatorio individual de um determinado entregador
$app->get(
    '/relatorio-individual-:id_entregador',
    function ($id_entregador) {
        require_once("view/relatorio-individual.php");
    }
);

//Rota para cadastro de novas taxas
$app->get(
    '/nova-taxa',
    function () {
        require_once("view/nova-taxa.php");
    }
);

//Rota para cadastro de novos funcionarios
$app->get(
    '/novo-funcionario',
    function () {
        require_once("view/novo-funcionario.php");
    }
);

$app->run();