<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once("view/header.php");?>
<?php include_once("view/navbar.php");?>

<section>
    <div class="container" id="main">
        <?php
            include_once("model/pedidos/visualizar-pedido.php");
        ?>
    </div>
</section>


<?php include_once("view/footer.php");?>
<script src='js/funcoes-pedido_item.js'></script>

<script>

    $("#pedidos").addClass("active");

</script>


</body>
</html>