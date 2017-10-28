
$(document).ready(function($){

    $("#cliente_nome").keyup(function(){
        $.ajax({
            type: "POST",
            url: './inc/busca_clientes.php',
            data: {_cliente_nome: $("#cliente_nome").val()},
            dataType: 'text',
            success: function(data){

                var data = JSON.parse(data);

                data = $.map(data, function (cliente, i) {
                    return {
                        id: cliente.id,
                        label: cliente.nome + " - " +cliente.telefone,
                        value: cliente.nome
                    };
                });

                $( "#cliente_nome" ).autocomplete({
                    source: data,
                    select: function (event, ui) {
                        console.log(ui.item.id);
                        $("#cliente_id").val(ui.item.id);
                        console.log($("#cliente_id"));

                    },
                    minLength : 1
                });
            }
        });
    });
});