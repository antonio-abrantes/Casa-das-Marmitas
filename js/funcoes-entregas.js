$(function () {


    $("#listar-individual").on('click', function () {
        // console.log($("#entregador_id").val());
        // console.log($("#data-inicial").val());
        // console.log($("#data-final").val());
        REQ_LISTAGEM_INDIVIDUAL($("#entregador_id").val(), $("#data-inicial").val(),$("#data-final").val() );
    });

    function REQ_LISTAGEM_INDIVIDUAL(id, data_inicial, data_final) {

        $.ajax(
            {
                method: "POST",
                url: './inc/request-relatorio-individual.php',
                data: {entregador_id: id, data_incial: data_inicial, data_final: data_final},
                dataType: 'text',
                success: function (retorno) {
                    //console.log(retorno);
                    $("#resultado").html(retorno);
                }
            }
        );
    }

    $("#listar-geral").on('click', function () {
        REQ_LISTAGEM_GERAL($("#data-inicial").val(),$("#data-final").val());
    });

    function REQ_LISTAGEM_GERAL(data_inicial, data_final) {

        $.ajax(
            {
                method: "POST",
                url: './inc/request-relatorio-geral.php',
                data: { data_incial: data_inicial, data_final: data_final},
                dataType: 'text',
                success: function (retorno) {
                    //console.log(retorno);
                    $("#resultado").html(retorno);
                }
            }
        );
    }

    console.log("Iniciado javascript do listagem..."); //Só pra testar o load do jQuery na pagina...
});