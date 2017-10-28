<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once("header.php");?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php include_once("navbar.php");?>

<section>
    <div class="container" id="main">
        <?php include_once("model/entregadores/relatorio-geral.php"); ?>
    </div>
</section>

<?php include_once("footer.php");?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/funcoes-entregas.js"></script>

<script>

    $("#entregadores").addClass("active");

</script>


</body>
</html>
