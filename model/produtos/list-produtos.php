<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';

$itens_por_pagina = 10;
//
//// Pegar pagina atual
$pagina = intval($pagina);
//
//Puxar o produto do banco

$sql_code = "SELECT id, nome, ingredientes, custo, tamanho FROM produtos LIMIT $pagina, $itens_por_pagina";

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$produtos = $execute->fetch_assoc();
//var_dump($produtos);
$num = $execute->num_rows;

//Quantidade total de obejtos no banco de dados
$num_total = $mysqli->query("SELECT id, nome, ingredientes, custo, tamanho FROM produtos");

//Definir numero de paginas
$num_paginas = ceil($num_total->num_rows/$itens_por_pagina);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-3">
                    <h2>Produtos</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Produtos">
                        <input type="hidden" id="query" value="">
                        <span class="input-group-btn">
                            <button id="search_btn" class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
				        </span>
                    </div>
                </div>
            </div>

            <?php  if($num > 0){  ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr style="background-color: #337ab7; color: white; font-weight: bold">
                        <td>Nome</td>
                        <td>Ingredientes</td>
                        <td>Custo</td>
                        <td>Tamanho</td>
                        <td class="text-center">Ações</td>
                    </tr>
                </thead>
                <tbody>

                <?php do{

//                foreach ($produtos as $key => $value) {
//                    $produtos[$key] = utf8_encode($value);
//                }

                    $produtos = Funcoes_auxiliares::condificaStringsUTF8($produtos);

                ?>

                <tr>
                    <td><?php echo $produtos['nome']; ?></td>
                    <td><?php

                        //$pedidos['telefone'] = Funcoes_auxiliares::formataTelefone($pedidos['telefone']);

                        echo $produtos['ingredientes'];   ?></td>
                    <td><?php echo "R$ ".Funcoes_auxiliares::formataValor($produtos['custo']);   ?></td>
                    <td><?php echo Funcoes_auxiliares::buscaTamanhoProduto($produtos['tamanho']);   ?></td>
                    <td class="text-center">
                        <a href="detalhes-produto-<?php echo $produtos['id']; ?>" class="label label-warning">DETALHES</a>
<!--                        <a href="" class="label label-danger">EXCLUIR</a>-->
                    </td>
                </tr>

                <?php  }while($produtos = $execute->fetch_assoc());  ?>

                </tbody>

            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="listar-produtos-0" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for($i = 0; $i < $num_paginas; $i++){

                        $estilo = "";
                        if($pagina == $i)
                            $estilo = "class=\"active\"";
                        ?>
                    <li <?php echo $estilo;  ?> ><a href="listar-produtos-<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                    <?php }  ?>

                    <li>
                        <a href="listar-produtos-<?php echo $num_paginas-1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <?php } ?>

        </div>
    </div>
</div>
