$(document).ready(function () {
    /** var global **/
    chave = [],array = [], aux = [];
    table = $('table');
    table.find('tr').each(function (itr) {
        $(this).find('th').each(function (ith) {
            chave[ith] = $(this).text();
        });
    });
    $('#calculaNumeros').click(function(){
        $('#calculaNumeros').prop("disabled",true);
        $('.panel-body').append('<div class="alert alert-info">Carregando, aguarde ...</div>');
        setTimeout(function(){
            returnArrayDataTable();
        }, 2000);

    })

});

/** Funções **/
function returnArrayDataTable(){
    var concursos = 0;
    table.find('tr').each(function (itr) {
        aux = [];
        /** Só entra caso seja ganhador único com 20 números **/
        if ($("tr:nth-child(" + (itr + 1) + ") td:nth-child(24)").text() == 1) {
            ++concursos;
            $(this).find('td').each(function (itd) {
                if (itd <= 21 || itd == 31) {
                    pushToAry(chave[itd], $(this).text())
                }

            });
            array.push(aux);
        }
       //if(concursos == 1)
         //   return false;

    });

    /** Realizando envio dos dados**/
    $.post("processa.php", {
        "data": JSON.stringify(array)
    })
        .done(function (retorno) {
            $('.panel-body').append('<div class="alert alert-warning">'+ retorno +
                '<a href="json/dados.json" class="pull-right"> '+concursos+' concursos salvos</a></div>');
            array = [];
            $('#calculaNumeros').prop("disabled",false);
        });
}


/** Função para retorno de array de objetos **/
function pushToAry(name, val) {
    var obj = {};
    obj[name] = val;
    aux.push(obj);
}




