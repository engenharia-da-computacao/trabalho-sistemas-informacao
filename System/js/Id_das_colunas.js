/** Commit **/
$.get('base/D_LOTMAN.HTM', function(data) {
	//Trabalhe com os dados aq, diretamente do arquivo base
     $('#conteudo').html(data);
     window.setTimeout( function(){
     	var array = [];
		var table = $('table');
		var chave = [];
		var chave2;
		 	table.find('tr').each(function(itr){
		 		array = [];
		 		//alert("teste"+itr);
		 		//if(itr < 5){
		 			$(this).find('th').each(function(){
		 				chave.push($(this).text());
		 			})

					$(this).find('td').each(function(itd){
						chave2 = chave[itd];
						alert(chave2);
						if(itd <= 24 || itd == 32){
							array.push(chave2+':'+$(this).text());
						}else if(itd == 33){
							console.log(array)
							/**$.post("teste.php", {
								"data": array
							});/**.done(function(retorno){
								//alert(retorno);
							});**/
						}
				 	});
				//}
		 	});
	 	
	 },5000);
});
