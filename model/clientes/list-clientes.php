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

$sql_code = "SELECT id, nome, telefone, bairro FROM clientes LIMIT $pagina, $itens_por_pagina";

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$clientes = $execute->fetch_assoc();

$num = $execute->num_rows;

//Quantidade total de obejtos no banco de dados
$num_total = $mysqli->query("SELECT id, nome, telefone FROM clientes");

//Definir numero de paginas
$num_paginas = ceil($num_total->num_rows/$itens_por_pagina);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-3">
                    <h2>Clientes</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Clientes">
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
                        <td>Telefone</td>
                        <td>Bairro</td>
                        <td class="text-center">Ações</td>
                    </tr>
                </thead>
                <tbody>

                <?php do{

                $clientes = Funcoes_auxiliares::condificaStringsUTF8($clientes);

                ?>

                <tr>
                    <td><?php echo $clientes['nome']; ?></td>
                    <td><?php

                        $clientes['telefone'] = Funcoes_auxiliares::formataTelefone($clientes['telefone']);

                        echo $clientes['telefone'];   ?></td>
                    <td><?php echo $clientes['bairro'];   ?></td>
                    <td class="text-center">
                        <a href="detalhes-cliente-<?php echo $clientes['id']; ?>" class="label label-warning">DETALHES</a>
<!--                        <a href="" class="label label-danger">EXCLUIR</a>-->
                    </td>
                </tr>

                <?php  }while($clientes = $execute->fetch_assoc());  ?>

                </tbody>

            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="listar-clientes-0" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for($i = 0; $i < $num_paginas; $i++){

                        $estilo = "";
                        if($pagina == $i)
                            $estilo = "class=\"active\"";
                        ?>
                    <li <?php echo $estilo;  ?> ><a href="listar-clientes-<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                    <?php }  ?>

                    <li>
                        <a href="listar-clientes-<?php echo $num_paginas-1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <?php } ?>

        </div>
    </div>
</div>
