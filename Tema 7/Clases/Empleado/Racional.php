<?php

    class Racional{
        private String $numero;
        function __construct($numero){
            $this->numero = $numero;
        }

        function __destruct(){
            unset($this->numero);
        }
    }