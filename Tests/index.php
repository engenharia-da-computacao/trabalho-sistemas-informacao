
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section>
    <div class="container-fluid" style="margin-top:50px">

        <div class="row col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Relação da testes</h3>
                    Testes realizados com Selenium IDE, browser Firefox, S.O Ubuntu
                    <br/><br/>
                    OBS: realize os testes em um sistema linux para as funções exec() funcionar e execute (sudo chmod +777 -R trabalho-sistema-informacao) antes de realizar os testes e confira os diretorios com nomes corretos.
                </div>
                <div class="panel-body">
                    <a href="test1/test.php" class="btn btn-success center" id="teste1">Teste 1</a>
                    Teste simples de execução
                    <hr/>

                    <a href="test2/test.php" class="btn btn-danger center" id="teste2">Teste 2</a>
                    Erro ao apagar arquivo base
                    <hr/>

                    <a href="test3/test.php" class="btn btn-danger center" id="teste3">Teste 3</a>
                    Erro ao apagar conteudo do arquivo base
                    <hr/>

                    <a href="test4/test.php" class="btn btn-danger center" id="teste4">Teste 4</a>
                    Erro ao colocar registros duplicados na tabela
                    <hr/>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>