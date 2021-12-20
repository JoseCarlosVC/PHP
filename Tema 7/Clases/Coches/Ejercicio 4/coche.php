<?php
    class Coche extends CuatroRuedas{
        protected $numCadenasNieve;

        public function __construct($color,$peso,$numPuertas,$numCadenasNieve){
            parent::__construct($color,$peso,$numPuertas);
            $this->numCadenasNieve = $numCadenasNieve;
        }
        public function addCadenasNieve($num){
            $this->numCadenasNieve+=$num;
        }
        public function quitarCadenasNieve($num){
            $this->numCadenasNieve-=$num;
        }
        public function __destruct(){
            parent::__destruct();
            unset($this->numCadenasNieve);
        }

        public function setNumCadenasNieve($numCadenasNieve){
            $this->numCadenasNieve = $numCadenasNieve;
        }

        public function getNumCadenasNieve(){
            return $this->numCadenasNieve;
        }
    }
?>