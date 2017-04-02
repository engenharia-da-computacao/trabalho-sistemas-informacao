<?php

//$dados = isset($_POST['data']) ? filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING) : '';
$dados = $_POST['data'];

/** Include app **/
include_once "app.php";

$processa = new Processa($dados);

echo $processa->saveDataFile();
