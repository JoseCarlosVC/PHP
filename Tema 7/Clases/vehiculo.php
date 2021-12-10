<?php
    class Vehiculo{
        private $color;
        private $peso;

        public function __construct($color, $peso){
            $this->color = $color;
            $this->peso = $peso;
        }

        public static function circula(){
            echo "Circular...";
        }
        public function addPersona($pesoPersona){
            $pesoActual = $this->getPeso();
            $this->setPeso($pesoActual + $pesoPersona);
        }

        public function __destruct(){
            unset($this->color);
            unset($this->peso);
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->$color = $color;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function setPeso($peso){
            $this->$peso = $peso;
        }

    }
?>