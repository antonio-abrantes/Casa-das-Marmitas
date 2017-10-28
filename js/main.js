/**
 * Created by Antonio Abrantes on 06/06/2017.
 */


$(function () {

    var homeId = document.getElementsByTagName("body")[0]["id"];
    //alert(homeAtiva.toString());
    verifica(homeId);

});

function verifica(homeId) {
    if(homeId === "tab-principal"){
        $("#_home").addClass("active-inicio");
        // $("#_home").addClass("active-inicio").attr({
        //     "href" : "#"
        // });
    }else if(homeId === "tab-servicos"){
        $("#_servico").addClass("active-servico")
        // $("#_servico").addClass("active-servico").attr({
        //     "href" : "#"
        // });
    }else if(homeId === "tab-estudio"){

        $("#_estudio").addClass("active-o-estudio");

    }else if(homeId === "tab-portifolio"){

        $("#_portifolio").addClass("active-portfolio");

    }else if(homeId === "tab-contato"){

        $("#_contato").addClass("active-contato");

    }
}