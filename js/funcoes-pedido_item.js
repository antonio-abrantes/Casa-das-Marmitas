$(function () {

        //Atualiza os campos para os valores iniciais
        atualizaValores();
        calculaTroco();
        valorPago();

        /*
         * Cada select ao ser povoado pelo PHP, o seu atributo value rece o preço do do produco que preenche o campo
         * Quando um select é selecionado, o campo com a classe preco referente a seu bloco é atualizado
         */
        $('body').on("change", ".selecionar", function (event) {


            //console.log($( event.target ).closest( "td.selecionar" ));

            var produto = $(this).parent().parent().parent();

            var tagPreco = $(produto).find("span");

            var preco = parseFloat($(this).val());

            //Atribui o valor do produto a celula "valor" da tabela
            tagPreco.text(number_format(preco, 2, '.', ','));
            atualizaValores();
        });


        $("#valor-pago").on("blur", function () {
            valorPago();
            calculaTroco();
        });

        $("#troco").on("blur", function () {
            calculaTroco();
        });

        function valorPago() {
            var valor = $("#valor-pago");
            $("#valor-pago").val(number_format(valor[0].value, 2, '.', ','));
        }

        function calculaTroco() {
            var troco = parseFloat($("#valor-pago").val()) - parseFloat($("#total").val());
            $("#troco").val(number_format(troco, 2, '.', ','));
        }


        /*
         * Função referente aos campos de quantidade, ao mudar o valor, o atulaizaValores é acionado para calcular o novo total
         */
        $("#list-produtos").on("change", ".quantidade", function () {
            atualizaValores();
        });


        /*
         * A funçao atualiza valores pega todos os campos com classe produto, e busca pelos seus preços e faz os calculos,
         * ao final do laço, é atribudo o valor total ao campo com id total.
         */
        function atualizaValores() {
            var produtos = document.getElementsByClassName("produto");

            var resultado = 0;
            var numIndece = 1;

            for (var pos = 0; pos < produtos.length; pos++) {

                var precoElements = produtos[pos].getElementsByClassName("preco");
                var precoText = precoElements[0].innerHTML;

                var subTotalItem = produtos[pos].getElementsByClassName("sub-total");

                var qtdElements = produtos[pos].getElementsByClassName("quantidade");
                var qtdText = qtdElements[0].value;

                var indice = produtos[pos].getElementsByClassName("indice");
                indice[0].innerHTML = numIndece.toString();
                numIndece++;

                var preco = parseFloat(precoText);
                var qtd = parseInt(qtdText);

                resultado += preco * qtd;
                var subTotal = preco * qtd;
                subTotalItem[0].innerHTML = number_format(subTotal.toString(), 2, '.', ',');
                //console.log(subTotal);
            }

            var taxa = $("#taxa");

            resultado += parseFloat(taxa[0].value);

            $("#total").val(number_format(resultado, 2, '.', ','));
            calculaTroco();
        }

    /*
    * Função para formatar em formato decimal
    * Exemplo de chamada: number_format( 5000.000000, 2, '.', ',' )
    */
    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number+'').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    /* Inicio das funções da montagem dos dados para envio do pedido */

    $("#json-item").on("click", montarJson);


    function montarJson() {

        /*
        * Implementar acesso a tabela pedido_itens gerando o numero do pedido no momento que abrir pedidos
        * Se confirmado, implementar procedimentos para salvar
        * Se cancelado ou não confirmado, fazer acesso ao banco passando o id do pedido para deleta-lo
        */

        //var idCliente = $("#cliente_nome").attr("data-idcliente");
        var idCliente = $("#cliente_id").val();

        var nomeCliente = document.getElementById('cliente_nome').value;

        var num_pedido = document.getElementById('num_pedido').innerHTML;

        var produtos = document.getElementsByClassName("produto");

        var pedido = {'id_cliente': idCliente , 'num_pedido': parseInt(num_pedido), 'lista': []};

        var lista = [];

        for (var pos = 0; pos < produtos.length; pos++) {

            var listaItens = {
                'num_item': 0,
                'id_item': 0,
                'qtd_itens': 0};

            var qtdElements = produtos[pos].getElementsByClassName("quantidade");
            var qtd = qtdElements[0].value;

            var id = capturarIdDoSelectedIndex(produtos[pos]);

            listaItens['id_item'] = id;
            listaItens['qtd_itens'] = qtd;
            //console.log("ID do item: "+listaItens['id_item']);

            if(qtd !== 0 && id !== undefined){
                lista.push(listaItens);
            }
        }

        //console.log(lista);
        pedido['lista'].push(lista);

        console.log(pedido);
        enviarPedido(pedido);

    }

    function enviarPedido(pedido) {
        $.ajax(
            {
                url: 'inc/item_funcoes.php',
                type: "GET",
                data: {pedido :pedido},
                success: function (retorno) {
                    console.log(retorno);
                }
            }
        );
    }

    function capturarIdDoSelectedIndex(elemento) {

        var elements = elemento.getElementsByClassName("selecionar");

        var idSelecionado = $(elements).find(":selected");

        //console.log(idSelecionado.attr('id'));

        return idSelecionado.attr('id');
    }


    /* Fim das funções da montagem dos dados para envio do pedido  */


        // Função que atribui o numeração visual das linhas da tabela
        function atualizaIndicesItens() {
            var produtos = document.getElementsByClassName("produto");

            var numIndece = 1;

            for (var pos = 0; pos < produtos.length; pos++) {

                var indice = produtos[pos].getElementsByClassName("indice");
                indice[0].innerHTML = numIndece.toString();
                numIndece++;
            }
        }

        //Função que escuta o botão de adicionar item e chama a função ajax
        $("#add-item").on("click", REQ_AJAX_GET);


        //Função que faz a requisição do fragmento de php que será colocado na tabela...
        function REQ_AJAX_GET() {
            $.ajax(
                {
                    method: "GET",
                    url: './model/pedidos/item.php',
                    done: function () {
                        $('.aguarde').html("Carregando...");  //No done, vc pode realizar uma ação enquanto agurda a resuisição, geralmente utilizada para loading
                    },
                    success: function (retorno) {
                        $("#list-produtos").append(retorno);  //Aqui vem o retorno, exitem outros metodos, append, load, facil de entender na documentação do jQuery
                        atualizaIndicesItens();
                    }
                }
            );
        }


        //Função para buscar o tamanho e atribuir ao select de tamanho
        function REQ_BUSCA_TAMANHO(id, objeto) {

            $.ajax(
                {
                    method: "POST",
                    url: './inc/busca_tamanho.php',
                    data: {_id: id}, //Id passado por parametro do javaScrip para o php
                    dataType: 'text',
                    success: function (retorno) {
                        objeto.innerHTML = retorno; //resposta de execução da requisição php
                    }
                }
            );
        }


        /*
         * Função do botão remover
         */
        remover = function (item) {
            var tr = $(item).closest('tr');

            tr.fadeOut(400, function () {
                tr.remove();
                atualizaValores();
            });
        };

        console.log("Iniciado..."); //Só pra testar o load do jQuery na pagina...
    }
);