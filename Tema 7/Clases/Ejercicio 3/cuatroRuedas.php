<?php
    class CuatroRuedas extends Vehiculo{
        private $numPuertas;

        function __construct($color,$peso,$numPuertas){
            parent::__construct($color,$peso);
            $this->numPuertas = $numPuertas;
        }
        public static function repintar($color){
            parent::setColor($color);
        }
        function __destruct(){
            parent::__destruct();
            unset($this->numPuertas);
        }
        public function getNumPuertas(){
            return $this->numPuertas;
        }

        public function setNumPuertas($numPuertas){
            $this->$numPuertas = $numPuertas;
        }
    }
?>