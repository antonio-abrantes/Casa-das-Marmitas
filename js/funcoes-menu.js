/**
 * Created by M2 on 14/09/2017.
 */
$(function () {

    $("#principal").on("click", function () {
        //alert("Funcionou!!");
    });


    // $("#novo-pedido").on("click", function () {
    //     $.ajax(
    //         {
    //             url: 'view/novo_pedido.php',
    //             type: "GET",
    //             success: function (retorno) {
    //                 $("#main").html(retorno);
    //             }
    //         }
    //     );
    // });

    $("li").on('click', function () {

        $(".active").removeClass("active");

        $(this).toggleClass("active");

    });

    console.log("Iniciado javascript do menu..."); //Só pra testar o load do jQuery na pagina...
});