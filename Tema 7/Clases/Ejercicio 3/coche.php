<?php
    class Coche extends CuatroRuedas{
        private $numCadenasNieve;

        function __construct($color,$peso,$numPuertas,$numCadenasNieve){
            parent::__construct($color,$peso,$numPuertas);
            $this->numCadenasNieve = $numCadenasNieve;
        }
        public function addCadenasNieve($num){
            $this->setNumCadenasNieve($this->getNumCadenasNieve() + $num);
        }
        public function quitarCadenasNieve($num){
            $this->setNumCadenasNieve($this->getNumCadenasNieve() - $num);
        }

        function __destruct(){
            parent::__destruct();
            unset($this->numCadenasNieve);
        }

        public function setNumCadenasNieve($numCadenasNieve){
            $this->$numCadenasNieve = $numCadenasNieve;
        }

        public function getNumCadenasNieve(){
            return $this->numCadenasNieve;
        }
    }
?>