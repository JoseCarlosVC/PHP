<?php

    class Empleado{
        private String $nombre;
        private float $sueldo;

        function __construct(String $nombre, float $sueldo){
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        public function imprimir(){
            echo "<span>Nombre del empleado: $this->nombre</span></br>";
            if($this->sueldo > 3000){
                echo "<span>Debe pagar impuestos</span>";
            }else{
                echo "<span>Debe pagar impuestos</span>";
            }
        }

        function __destruct(){
            unset($this->nombre);
            unset($this->sueldo);
        }
    }