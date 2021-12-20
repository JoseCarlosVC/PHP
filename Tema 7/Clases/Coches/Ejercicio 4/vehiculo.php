<?php
    abstract class Vehiculo{
        protected $color;
        protected $peso;

        public function __construct($color, $peso){
            $this->color = $color;
            $this->peso = $peso;
        }

        public static function circula(){
            echo "El vehículo circula";
        }
        abstract public function addPersona($pesoPersona);

        public function __destruct(){
            unset($this->color);
            unset($this->peso);
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->color = $color;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function setPeso($peso){
            $this->peso = $peso;
        }

        public function repintar($color){
            $this->color = $color;
        }

        public function ponerGasolina($litros){
            $this->peso += $litros;
        }

        public static function ver_atributo($objeto){
            if(isset($objeto->color)){
                echo $objeto->color."<br>";
            }
            if(isset($objeto->peso)){
                echo $objeto->peso."<br>";
            }
            if(isset($objeto->numPuertas)){
                echo $objeto->numPuertas."<br>";
            }
            if(isset($objeto->cilindrada)){
                echo $objeto->cilindrada."<br>";
            }
            if(isset($objeto->longitud)){
                echo $objeto->longitud."<br>";
            }
            if(isset($objeto->numCadenasNieve)){
                echo $objeto->numCadenasNieve."<br>";
            }
        }
    }
?>