<?php

    class Processa{
        private $dados = '';
        private $premiacao = [];
        private $arrayNumSorteados = [];
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
        //Bolas => posição 2 até 21
        public function returnArrayNumeros2(){
            $cont = 0;
            foreach ($this->dados as $key=>$sorteio) {
                $numBolas = 0;
                foreach($sorteio as $key2=>$teste){
                    if($key2 > 1 && $key2 < 22){
                        $numBolas++;
                        array_push($this->arrayNumSorteados,$teste['Bola'.$numBolas]);
                    }
                }
                ++$cont;


            }

            //rsort($this->arrayNumSorteados);
            return $this->arrayNumSorteados;

        }
    }

?>