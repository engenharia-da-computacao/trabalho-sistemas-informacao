<?php
/**
 * Arquivo com configurações globais do sistema
 */


/**
 * Definindo constantes do sistema
 */
define("NOME_APLICATIVO", "Mineiros de Minas | LotoMania");
define("baseUrl", dirname(__FILE__) . "/");



/**
 * Incluindo diretivas de importação de classes a partir do diretório específico
 */
spl_autoload_extensions('.php');

/**
 * Função que auto-carrega as classes
 * @param string $class Nome da classe a ser carregada
 * @return boolean
 * Se o aquivo que chamou o app.php estiver em uma outra pasta,
 * sai da pasta e retorna o arquivo.
 */
function classLoader($class) {
    $nomeArquivo = $class . '.php';

    if (file_exists("Class/" . $nomeArquivo)) {

        $file = "Class/" . $nomeArquivo;
    } else if (file_exists("../Class/" . $nomeArquivo)) {

        $file = "../Class/" . $nomeArquivo;
    } else {
        return false;
    }
    include $file;
    
}

function tratarErros($codigo, $erro, $arquivo = NULL, $linha = NULL) {
    if (error_reporting() & $codigo) {
        // This error is not suppressed by current error reporting settings
        // Convert the error into an ErrorException
        throw new ErrorException($erro, $codigo, 0, $arquivo, $linha);
    }

    // Do not execute the PHP error handler
    return TRUE;
}

/**
 * Registrando função de auto-carregamento
 */
spl_autoload_register('classLoader');
set_error_handler("tratarErros");





