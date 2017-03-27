<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Mineiros de Minas | LotoMania</title>


</head>
<body>

<button id="calculaNumeros"> Meus números da sorte!</button>


<?php
    /** Chamando arquivo base **/
    $conteudo = utf8_encode(file_get_contents('base/D_LOTMAN.HTM'));

    /** Retirando dados inúteis **/
    $posicaoInicio = strpos($conteudo,"<table");
    $conteudo = substr($conteudo, $posicaoInicio);

    $posicaoFinal = strpos($conteudo,"</table>");
    $conteudo = substr($conteudo, 0,$posicaoFinal);
    /** Renderizando **/
    echo '<div class="hidden">'.$conteudo.'</div>';

?>
<script src="js/jquery.js"></script>
<script src="js/index.js"></script>
</body>
</html>

