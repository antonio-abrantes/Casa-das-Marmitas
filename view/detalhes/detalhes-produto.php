<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once("view/header.php");?>
<?php include_once("view/navbar.php");?>

<section>
    <div class="container" id="main">
        <?php
            include_once("model/produtos/visualizar-produto.php");
        ?>
    </div>
</section>


<?php include_once("view/footer.php");?>

<script>

    $("#produtos").addClass("active");

</script>


</body>
</html>