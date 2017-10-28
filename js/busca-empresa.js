
$(document).ready(function($){

    $("#empresa_nome").keyup(function(){
        $.ajax({
            type: "POST",
            url: './inc/busca_empresa.php',
            data: {_cliente_nome: $("#empresa_nome").val()},
            dataType: 'text',
            success: function(data){

                var data = JSON.parse(data);

                data = $.map(data, function (empresa, i) {
                    return {
                        id: empresa.id,
                        label: empresa.nome + " - " +empresa.cnpj,
                        value: empresa.nome
                    };
                });

                $( "#empresa_nome" ).autocomplete({
                    source: data,
                    select: function (event, ui) {
                        console.log(ui.item.id);
                        $("#empresa_id").val(ui.item.id);
                        console.log($("#empresa_id"));

                    },
                    minLength : 1
                });
            }
        });
    });
});