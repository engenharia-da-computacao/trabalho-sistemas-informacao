<?php

$dados = json_decode($_POST['data']);

$cont = 0;
foreach ($dados as $data) {
 ++$cont;
}
echo $cont;