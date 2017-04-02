<?php
/** Include app **/
include_once "app.php";
/** Chamando arquivo base **/
$conteudo = utf8_encode(file_get_contents('base/D_LOTMAN.HTM'));

/** Retirando dados inúteis **/
$posicaoInicio = strpos($conteudo,"<table");
$conteudo = substr($conteudo, $posicaoInicio);
/** Caso o arquivo não possua ao menos o table, retorna false **/
$posicaoFinal = strpos($conteudo,"</table>");
$conteudo = substr($conteudo, 0,$posicaoFinal);

/** Verificando se o arquivo já existe **/
$dadosExist = false;
if(file_exists('json/dados.json'))
    $dadosExist = true;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title><?=(NOME_APLICATIVO)?></title>
</head>
<body>

<section>
    <div class="container-fluid" style="margin-top:250px">
        <div class="row col-sm-6 col-sm-offset-3 ">
            <button class="btn btn-info col-sm-12 col-xs-12 btn-lg center" id="calculaNumeros">
                <i class="glyphicon glyphicon-file"></i> Gerar Arquivo</button>
        </div>

        <div class="row col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Registo da operação</h3>
                </div>
                <div class="panel-body">

                    <div class="alert alert-warning">
                        <?=($conteudo)?'Conteúdo base carregado':'Conteúdo base não encontrado!'?>
                    </div>

                    <?php
                    if($dadosExist){
                    echo '<div class="alert alert-success"> O Arquivo já foi gerado.
                        <i class="pull-right"><a href="json/dados.json">Acessar</a></i>
                    </div>';
                     }?>

                </div>
            </div>

        </div>

    </div>
</section>


<?php
    /** Renderizando **/
    echo '<div class="hidden">'.$conteudo.'</div>';
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>

