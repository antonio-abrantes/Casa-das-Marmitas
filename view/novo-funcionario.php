<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once("header.php");?>
<?php include_once("navbar.php");?>

<section>
    <div class="container" id="main">
        <?php include_once("cadastros/create-funcionario.php");?>
    </div>
</section>

<?php include_once("footer.php");?>

<script>

    $("#funcionarios").addClass("active");

</script>


</body>
</html>