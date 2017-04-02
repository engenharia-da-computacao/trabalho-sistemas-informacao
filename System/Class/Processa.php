<?php

    class Processa{
        private $dados = '';
        private $premiacao = [];
        private $arrayNumSorteados = [];
        private $arrayNumSorteadosRow = [];
        private $maxPremiacao = 0;
        private $db = false;


        function __construct($dados){
            $this->dados = $dados;
           //$this->db = new Bd();
        }


        /** Salvando os dados requisitados em arquivo **/
        public function saveDataFile(){
            /** Verifica exitência da pasta **/
           if ($this->verifyPatch()){
            $file = new File('json/dados.json', $this->dados);
            if($file->renderizar())
                $retorno = 'Arquivo criado com sucesso!';
            else
               $retorno =  'Houve um erro ao tentar criar o arquivo. Cheque suas permissões de pasta';
           }else
               $retorno = 'Houve um erro de permissão de acesso a pasta!';

           return $retorno;
        }
        /** Verificando se pasta existe **/
        private function verifyPatch(){
            if(!file_exists('json'))
               return mkdir("json");
            else
                return true;
        }


        /**
         * As funções abaixo serão utilizadas e implementadas
         * em outra fase de desenvolvimento
         */

        public function exibeMaiorPremiacao(){
            return $this->retornaMaiorPremiacao();
        }
           
        /** Será utilizado em outra fase **/
        private function retornaMaiorPremiacao(){
            foreach($this->dados as $key=>$dados){
                array_push($this->premiacao, [$dados['valor']]);
            }
            rsort($this->premiacao);
            $this->maxPremiacao = $this->premiacao[0];
            return json_encode($this->maxPremiacao);
        }
        /**
         * Função para separar o array de numeros de bolas
         * (Será utilizado em outra fase)
         * Bolas => posição 2 até 21
         */
        private function returnArrayNumeros(){
            $cont = 0;
            foreach ($this->dados as $key=>$sorteio) {
                $numBolas = 0;
                $aux = [];
                foreach($sorteio as $key2=>$teste){
                    if($key2 > 1 && $key2 < 22){
                        $numBolas++;
                        array_push($this->arrayNumSorteados,$teste['Bola'.$numBolas]);
                        array_push($aux,['Bola'.$numBolas=>$teste['Bola'.$numBolas]]);
                    }
                }
                array_push($this->arrayNumSorteadosRow,$aux);
                ++$cont;
            }
        }

        /**
         * Função para gravar dados no Banco de Dados
         * (Será utilizado em outra fase)
         */
        private function executeInsert(){
            $this->returnArrayNumeros();
            $campos = [];
            foreach ($this->arrayNumSorteadosRow as $key=>$sorteio) {
                //$campos = ['bola1' => $this->nome, 'codigo_pessoa' => $this->cod_pessoa];
                //$sql = SQLUtils::gerarInsert('usuarios_pendencias', $campos);
                //DBUtils::executeOperacaoDB($sql, $campos);
            }

        }
    }

?>