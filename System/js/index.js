	$(document).ready(function () {
        var chavesBuscadas = ['Data Sorteio'];
        var array = [];
        var aux = [];
        var table = $('table');
        chave = [];
        var concursos = 0;


        table.find('tr').each(function(itr){

                $(this).find('th').each(function(ith){
                    chave[ith] = $(this).text();
                });
        });

        table.find('tr').each(function(itr){
            aux = [];
            /** Só entra caso haja ganhado único com 20 números **/
            if($("tr:nth-child("+(itr+1)+") td:nth-child(24)").text() == 1){
            	++concursos;
                $(this).find('td').each(function(itd){
                    if(itd <= 24 || itd == 32){
                        pushToAry(chave[itd],$(this).text() )
                    }
                        /**$.post("teste.php", {
								"data": array
							});/**.done(function(retorno){
								//alert(retorno);
							});**/
                });
                array.push(aux);
            }

            if(concursos == 10)
                return false;


        });

        console.log(JSON.stringify(array))



        /** Função para retorno de array de objetos **/
        function pushToAry(name, val) {
            var obj = {};
            obj[name] = val;
            aux.push(obj);
        }


    });




