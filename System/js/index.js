	$(document).ready(function () {
        //var chavesBuscadas = ['Data Sorteio'];
        /** var global **/
        chave = [],array = [], aux = [];
        table = $('table');
        table.find('tr').each(function (itr) {

            $(this).find('th').each(function (ith) {
                chave[ith] = $(this).text();
            });
        });
        $('#calculaNumeros').click(function(){
            calculaNumerosSorte();
        })


    });

/** Funções **/

function calculaNumerosSorte(){
    var concursos = 0;

    table.find('tr').each(function (itr) {
        aux = [];
        /** Só entra caso haja ganhado único com 20 números **/
        if ($("tr:nth-child(" + (itr + 1) + ") td:nth-child(24)").text() == 1) {
            ++concursos;
            $(this).find('td').each(function (itd) {
                if (itd <= 24 || itd == 32) {
                    pushToAry(chave[itd], $(this).text())
                }

            });
            array.push(aux);
        }

        if(concursos == 2)
            return false;


    });
    console.log(JSON.stringify(array));

    /** Realizando envio dos dados**/
    $.post("processa.php", {
        "data": JSON.stringify(array)
    })
        .done(function (retorno) {
            console.log(retorno);
            array = [];
        });
}


    /** Função para retorno de array de objetos **/
    function pushToAry(name, val) {
        var obj = {};
        obj[name] = val;
        aux.push(obj);
    }




