<?php

$dados = $_POST['data'];

$dados = json_decode(($dados),true);

//echo print_r($dados);

/** Include class **/
include_once "Class/Processa.php";

$processa = new Processa($dados);

echo print_r($processa->returnArrayNumeros2());
