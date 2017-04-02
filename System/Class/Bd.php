<?php

class Bd extends PDO {

    public function __construct() {

        try {
            // Obtendo configuração do arquivo xml
            //$xml = simplexml_load_file(ARQUIVO_CONFIGURACOES . ".xml");
            //$controle = Crypto::decryptKey($xml->app->controle);
            $host = 'localhost';
            $user = 'root';
            $password = '123456';
            $database = 'lotomania';

            /**
             * Construindo objeto PDO e conectando-se ao banco de dados. Em caso de erro,
             * uma mensagem é exibida com a causa do erro
             */
            parent::__construct("mysql:host=" . $host . ";dbname=" . $database, $user, $password
                    , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            $erro = new Erro($ex->getMessage(), $ex->getLine(), $ex->getFile(), NULL);
            $erro->gravarLogErro();
        }
    }

}
