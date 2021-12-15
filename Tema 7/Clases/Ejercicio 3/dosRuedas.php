<?php
    class DosRuedas extends Vehiculo{
        private $cilindrada;

        function __construct($color,$peso,$cilindrada){
            parent::__construct($color,$peso);
            $this->cilindrada;
        }

        function __destruct(){
            parent::__destruct();
            unset($this->cilindrada);
        }

        public function getCilindrada(){
            return $this->cilindrada;
        }

        public function setCilindrada($cilindrada){
            $this->cilindrada = $cilindrada;
        }
    }
?>