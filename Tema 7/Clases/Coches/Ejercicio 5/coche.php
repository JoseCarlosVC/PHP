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
            if(($this->numCadenasNieve-$num)<0){
                $this->numCadenasNieve = 0;
            }else{
                $this->numCadenasNieve-=$num;
            }
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

        public function addPersona($pesoPersona){
            $this->setPeso($this->peso+$pesoPersona);
            //$this->peso += $pesoPersona;
            if($this->peso >= 1500 && $this->numCadenasNieve <= 2){
                echo "Atención, ponga 4 cadenas para la nieve";
            }
        }
    }
?>