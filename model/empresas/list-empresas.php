<?php

header("Content-Type: text/html; charset=utf-8");
include 'inc/conexao.php';
include 'inc/Funcoes_auxiliares.php';

$itens_por_pagina = 10;

// Pegar pagina atual
$pagina = intval($pagina);

//Puxar o produto do banco

$sql_code = "SELECT * FROM empresas LIMIT $pagina, $itens_por_pagina";

$execute = $mysqli->query($sql_code) or die($mysqli->error);

$empresas = $execute->fetch_assoc();

$num = $execute->num_rows;

//Quantidade total de obejtos no banco de dados
$num_total = $mysqli->query("SELECT id, nome, cnpj FROM empresas");

//Definir numero de paginas
$num_paginas = ceil($num_total->num_rows/$itens_por_pagina);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-sm-3">
                    <h2>Empresas</h2>
                </div>
                <div class="col-sm-6">
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search_query" type="text" placeholder="Pesquisar Empresas">
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
                        <td>CNPJ</td>
                        <td>Telefone</td>
                        <td>Cidade</td>
                        <td class="text-center">Ações</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php do{

                        $empresas = Funcoes_auxiliares::condificaStringsUTF8($empresas);

                        ?>

                        <tr>
                            <td><?php echo $empresas['nome']; ?></td>
                            <td><?php echo Funcoes_auxiliares::getCnjpFormatado($empresas['cnpj']);   ?></td>
                            <td><?php echo Funcoes_auxiliares::formataTelefone($empresas['telefone']);   ?></td>
                            <td><?php echo $empresas['cidade'];   ?></td>
                            <td class="text-center">
                                <a href="detalhes-empresa-<?php echo $empresas['id']; ?>" class="label label-warning">DETALHES</a>
                                <!--                        <a href="" class="label label-danger">EXCLUIR</a>-->
                            </td>
                        </tr>

                    <?php  }while($empresas = $execute->fetch_assoc());  ?>

                    </tbody>

                </table>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="listar-empresas-0" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for($i = 0; $i < $num_paginas; $i++){

                            $estilo = "";
                            if($pagina == $i)
                                $estilo = "class=\"active\"";
                            ?>
                            <li <?php echo $estilo;  ?> ><a href="listar-empresas-<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                        <?php }  ?>

                        <li>
                            <a href="listar-empresas-<?php echo $num_paginas-1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            <?php } ?>

        </div>
    </div>
</div>
