<?php

class RacionalCompleto{
    private int $dividendo;
    private int $divisor;

    function __construct($dividendo = 1, $divisor = 1){
        $this->dividendo = $dividendo;
        $this->divisor = $divisor;
    }
    function __destruct(){
        unset($this->dividendo);
        unset($this->divisor);
    }
}