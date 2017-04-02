<?php

/**
 * Classe que gera arquivo 
 * 
 * A flag FILE_APPEND faz com que se mantenha o conteúdo do arquivo
 * Utilize PHP_EOL para dar quebra de linha
 *
 * @author Guilherme Gomes
 */
class File {

    private $arquivo = '';
    private $dados = '';
    private $flags = '';

    function __construct($arquivo, $dados, $flags = '') {
        $this->arquivo = $arquivo;
        $this->dados = $dados;
        $this->flags = $flags;
    }

    public function renderizar() {

        $return =   ($this->flags)
                    ? file_put_contents($this->arquivo, $this->dados, $this->flags)
                    : file_put_contents($this->arquivo, $this->dados);

       return $return;

    }


}
