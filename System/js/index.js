	$(document).ready(function () {
        var chavesBuscadas = ['Data Sorteio'];
        var array = [];
        var table = $('table');
        var chave = [];
        var concursos = 0;

        table.find('tr').each(function(itr){
            array = [];
            if($("tr:nth-child("+itr+") td:nth-child(24)").text() == 1){
            	++concursos;
                $(this).find('td').each(function(itd){
                    if(itd <= 24 || itd == 32){
                        array[itd] = $(this).text();
                    }else if(itd == 33){
                        console.log(array)
                        /**$.post("teste.php", {
								"data": array
							});/**.done(function(retorno){
								//alert(retorno);
							});**/
                    }
                });

            }
            else{
               // $("tr:nth-child("+itr+")").remove();

            }

        });
        console.log(concursos);






    });




