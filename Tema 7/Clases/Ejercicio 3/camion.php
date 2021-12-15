<?php
    class Camion extends CuatroRuedas{
        private $longitud;

        function __construct($color,$peso,$numPuertas,$longitud){
            parent::__construct($color,$peso,$numPuertas);
            $this->longitud = $longitud;
        }
        public function addRemolque($longRemolque){
            $this->longitud += $longRemolque;
        }

        function __destruct(){
            parent::__destruct();
            unset($this->longitud);
        }

        public function setLongitud($longitud){
            $this->longitud = $longitud;
        }

        public function getLongitud(){
            return $this->longitud;
        }
    }
?>