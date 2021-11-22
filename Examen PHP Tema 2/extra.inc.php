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

    function feliz($numero){
        if($numero == "1"){
            return true;
        }else{
            $feliz = 0;
            for($i=0; $i<strlen($numero); $i++){
                $feliz += pow($numero[$i],2);
            }
            //El bucle se repetirá hasta que lleguemos al número original
            while($feliz != $numero){
                $texto = (string) $feliz;
                $feliz = 0;
                for($i=0;  $i<strlen($texto); $i++){
                    $feliz += pow($texto[$i],2);
                }
                //Si en algún momento llegamos a 1, el número es feliz
                if($feliz == 1){
                    return true;
                }
            }
            //Si se sale del bucle, el número no es feliz
            return false;
        }
    }

    function moverPrimos($arr_num){
        $primos = new SplFixedArray(count($arr_num));
        $principio = 0;
        $fin = (count($arr_num)-1);
        $contador = 0;
        for($i = 0; $i<count($arr_num); $i++){
            for($j = 1; $j<= $arr_num[$i]; $j++){
                if($arr_num[$i] % $j == 0){
                    $contador++;
                }
            }
            if($contador == 2){
                $primos[$fin] = $arr_num[$i];
                $fin--;
            }else{
                $primos[$principio] = $arr_num[$i];
                $principio++;
            }
            $contador = 0;
        }
        return $primos;
    }

    function mostrar($arr_num){
        echo "<table>";
            echo "<tr>";
                echo "<th>Clave</th>";
                echo "<th>Valor</th>";
            echo "</tr>";
            foreach($arr_num as $clave => $valor){
                echo "<tr>";
                    echo "<td>$clave</td>";
                    echo "<td>$valor</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>