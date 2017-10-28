<?php

    require_once('config_bd.php');

    $id = $_GET['_id'];

    $sql = new Sql();
    $tamanho_por_id = $sql->selectPorId("SELECT * FROM produto WHERE id=".$id);

    echo $tamanho_por_id;

?>