<?php
    class CuatroRuedas extends Vehiculo{
        protected $numPuertas;

        function __construct($color,$peso,$numPuertas){
            parent::__construct($color,$peso);
            $this->numPuertas = $numPuertas;
        }
        function __destruct(){
            parent::__destruct();
            unset($this->numPuertas);
        }
        public function getNumPuertas(){
            return $this->numPuertas;
        }

        public function setNumPuertas($numPuertas){
            $this->numPuertas = $numPuertas;
        }

        public function addPersona($pesoPersona){
            $this->peso += $pesoPersona;
        }
    }
?>