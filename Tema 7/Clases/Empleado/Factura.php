<?php
    
    class Factura{
        const IVA = 1.21;
        private float $importe_base;
        private String $fecha;
        private float $impuestos;
        private float $importe_bruto;
        private bool $estado;

        /**
         * @param float $importe_base
         * @param String $fecha
         * @param float $impuestos
         * @param float $importe_bruto
         * @param bool $estado
         */
        public function __construct(float $importe_base, string $fecha, float $impuestos, float $importe_bruto, bool $estado)
        {
            $this->importe_base = $importe_base;
            $this->fecha = $fecha;
            $this->impuestos = $impuestos;
            $this->importe_bruto = $importe_bruto;
            $this->estado = $estado;
        }

        public function imprimir(){
            echo "<span>I.V.A: ".self::IVA."</span></br>";
            echo "<span>Importe Base: $this->importe_base</span></br>";
            echo "<span>Fecha: $this->fecha</span></br>";
            echo "<span>Impuestos: $this->impuestos</span></br>";
            echo "<span>Importe Bruto: $this->importe_bruto</span></br>";
            echo "<span>Estado: $this->estado</span></br>";
        }


    }