<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Mineiros de Minas | LotoMania</title>


</head>
<body>

<section>
    <div class="container-fluid" style="margin-top:300px">
        <div class="row col-sm-8 col-sm-offset-2">
            <button class="btn btn-info col-sm-12 btn-lg center" id="calculaNumeros"> Meus números da sorte!</button>
        </div>
    </div>
</section>


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
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>

