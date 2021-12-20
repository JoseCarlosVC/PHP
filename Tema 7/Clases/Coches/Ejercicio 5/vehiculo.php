<?php
    const SALTO_DE_LINEA = "<br>";
    abstract class Vehiculo{
        protected $color;
        protected $peso;
        static protected $numero_cambio_color = 0;
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
            self::$numero_cambio_color ++;
        }

        public function getPeso(){
            return $this->peso;
        }

        public function setPeso($peso){
            if(get_class($this)=="Coche"){
                if($peso>2100){
                    $this->peso = 2100;
                }else{
                    $this->peso = $peso;
                }
            }else{
                $this->peso = $peso;
            }
        }

        public function repintar($color){
            $this->color = $color;
        }

        public function ponerGasolina($litros){
            $this->peso += $litros;
        }

        public static function ver_atributo($objeto){
            if(isset($objeto->color)){
                echo $objeto->color.SALTO_DE_LINEA;
            }
            if(isset($objeto->peso)){
                echo $objeto->peso.SALTO_DE_LINEA;
            }
            if(isset($objeto->numPuertas)){
                echo $objeto->numPuertas.SALTO_DE_LINEA;
            }
            if(isset($objeto->cilindrada)){
                echo $objeto->cilindrada.SALTO_DE_LINEA;
            }
            if(isset($objeto->longitud)){
                echo $objeto->longitud.SALTO_DE_LINEA;
            }
            if(isset($objeto->numCadenasNieve)){
                echo $objeto->numCadenasNieve.SALTO_DE_LINEA;
            }
        }
    }
?>