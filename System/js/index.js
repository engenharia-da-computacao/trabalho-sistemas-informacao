/** Commit **/
$.get('base/D_LOTMAN.HTM', function(data) {
	//Trabalhe com os dados aq, diretamente do arquivo base
     $('#conteudo').html(data);
});