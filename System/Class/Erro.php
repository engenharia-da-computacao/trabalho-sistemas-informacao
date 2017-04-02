<?php

/**
 * Classe para tratamento de erros.
 *
 * @author Eduardo Rodrigues <eduardo@eduardo.rodrigues.nom.br>
 * @version 1.0 24/10/2012
 */
class Erro {

    /**
     * Descrição do erro
     * @var String
     */
    protected $descricao = null;

    /**
     * Número da linha do script onde o erro ocorreu
     * @var int
     */
    protected $linha = null;

    /**
     * Nome do arquivo de script que gerou o erro
     * @var String
     */
    protected $arquivo = null;

    /**
     * Tipo de erro ocorrido.
     * @var String
     */
    protected $tipoErro = null;

    /**
     * (Opcional) Comando SQL que gerou o erro
     * @var String
     */
    protected $sql = null;

    /**
     * Construtor da classe
     * @param type $descricao Descrição do erro
     * @param type $linha Número da linha do script onde o erro ocorreu
     * @param type $arquivo Nome do arquivo de script que gerou o erro
     * @param type $tipoErro Tipo de erro ocorrido.
     * @param type $sql (Opcional) Comando SQL que gerou o erro
     */
    function __construct($descricao, $linha, $arquivo, $tipoErro, $sql = null) {
        $this->descricao = $descricao;
        $this->linha = $linha;
        $this->arquivo = $arquivo;
        $this->tipoErro = $tipoErro;
        $this->consulta = $sql;
    }

    /**
     * Grava erros do sistema em um arquivo de log.
     * @param string $mensagem Mensagem a ser gravada no arquivo
     * @param string $arquivo Arquivo onde o log será gravado
     * @return void
     */
    public function gravarLogErro() {
        // abrindo arquivo de log
        $arquivoLog = fopen("logs/erros.txt", 'a+b');

        // montando mensagem
        $mensagem = date("Y-m-d") . " " . date("H:i:s") . " | " .
                $this->tipoErro . " @ [" . $this->arquivo . ":$this->linha] - "
                . $this->descricao . "\r\n";

        // registrando mensagem e fechando arquivo
        fwrite($arquivoLog, $mensagem);
        fclose($arquivoLog);

        header("location: " . RAIZ_MANAGER . "/erro.php");
    }

}
