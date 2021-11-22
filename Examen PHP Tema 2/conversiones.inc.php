<?php
    function aBinario($decimal){
        $operacion = $decimal;
        $resto = 0;
        $arr_num = array();
        //Haremos el cálculo hasta que lleguemos a 1
        while($operacion>1){
            $resto = $operacion % 2;
            $operacion = $operacion / 2;
            array_unshift($arr_num,$resto);
        }
        $texto = implode($arr_num);
        settype($texto,"int");
        return $texto;
    }

    function aDecimal($binario){
        $decimal = 0;
        //Como hemos recogido el binario como texto, ahora podemos acceder a sus posiciones libremente, recorreremos número a número mientras que el exponente empezará en el final
        for($i=0, $j=(strlen($binario)-1); $i<strlen($binario); $i++, $j--){
            $decimal += $binario[$i] * pow(2,$j);
        }
        return $decimal;
    }
?>