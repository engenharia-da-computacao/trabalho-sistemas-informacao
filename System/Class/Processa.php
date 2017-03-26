<?php

    class Processa{
        private $dados = '';
        private $premiacao = [];
        private $maxPremiacao = 0;

        function __construct($dados){
            $this->dados = $dados;
        }

        public function exibeMaiorPremiacao(){
            return $this->retornaMaiorPremiacao();
        }
           

        private function retornaMaiorPremiacao(){  
                foreach($this->dados as $key=>$dados){
                    array_push($this->premiacao, [$dados['valor']]);
                }
                rsort($this->premiacao);
                $this->maxPremiacao = $this->premiacao[0];
                return json_encode($this->maxPremiacao);
        }
    }

?>