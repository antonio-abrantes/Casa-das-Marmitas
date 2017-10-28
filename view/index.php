<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once("header.php");?>
<?php include_once("navbar.php");?>

<section>
    <div class="container" id="main">
<!--        --><?php //include_once("inicio.php");?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center">

                    <img src="resources/img/logo-principal.png" class="img img-responsive" style="margin: 0 auto; border-radius: 10px 10px 10px 10px">

                    <h2>Seja bem vindo!!</h2>

                </div>
            </div>
        </div>
        <div>
            <div class="text-bold text-center" style="color: royalblue">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="https://tonhus.github.io/" target="_blank">Designed and Coded by Antônio Gonçalves de Abrantes Neto</a>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php");?>

<script>

    $("#principal").addClass("active");

</script>

</body>
</html>
