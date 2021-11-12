<?php
    function esCapicua($numero){
        $primera_cifra = 0;
        $ultima_cifra = 0;
        $segunda_cifra = 0;
        $penultima_cifra = 0;
        $capicua = false;
        //Sacamos la primera cifra
        if($numero < 10){
            $primera_cifra = $numero;
            $ultima_cifra = $numero;
        }else if(($numero >= 10) && ($numero <100)){
            $primera_cifra = $numero / 10;
            $primera_cifra = floor($primera_cifra);
        }else if(($numero >= 100) && ($numero < 1000)){
            $primera_cifra = $numero / 100;
            $primera_cifra = floor($primera_cifra);
        }else if(($numero >= 1000) && ($numero < 10000)){
            $primera_cifra = $numero / 1000;
            $primera_cifra = floor($primera_cifra);
            //Necesitamos la segunda cifra de los números de 4 y 5 cifras
            $segunda_cifra = $numero / 100;
            $segunda_cifra = floor($segunda_cifra);
            $segunda_cifra = $segunda_cifra % 10;
            //Sacamos la penúltima cifra
            $penultima_cifra = $numero % 100;
            $penultima_cifra = $penultima_cifra / 10;
            $penultima_cifra = floor($penultima_cifra);
        }else if(($numero >= 10000) && ($numero < 100000)){
            $primera_cifra = $numero / 10000;
            $primera_cifra = floor($primera_cifra);
            //Sacamos la segunda cifra
            $segunda_cifra = $numero / 1000;
            $segunda_cifra = floor($segunda_cifra);
            $segunda_cifra = $segunda_cifra % 10;
            //Sacamos la penúltima cifra
            $penultima_cifra = $numero % 100;
            $penultima_cifra = $penultima_cifra / 10;
            $penultima_cifra = floor($penultima_cifra);
        }
        //Sacamos la última cifra
        $ultima_cifra = $numero % 10;

        if(($primera_cifra == $ultima_cifra) && ($segunda_cifra == $penultima_cifra)){
            $capicua = true;
        }else{
            $capicua = false;
        }
        return $capicua;
    }

    function esPrimo($numero){
        $es_primo = true;
        //Empezamos el bucle en 2 y acabamos antes de llegar al numero introducido; asi si alguna vez es divisible sabremos que no es primo
        //En caso de que sea positivo o negativo habra que usar un bucle diferente
        if($numero >= 0){
            for($i=2; $i<$numero; $i++){
                if(($numero % $i) == 0){
                    //Si en algun caso es divisible, se descarta
                    $es_primo = false;
                }
            }
        }else{
            for($i=($numero+1); $i<-1; $i++){
                if(($numero % $i) == 0){
                    $es_primo = false;
                }
            }
        }
        return $es_primo;
    }

    function siguientePrimo($numero){
        $candidato  = $numero;
        $es_primo = true;
        $primo = 0;
        while($primo == 0){
            $candidato ++;
            for($i=2; $i<$candidato; $i++){
                if(($candidato % $i) == 0){
                    //Si en algun caso es divisible, se descarta
                    $es_primo = false;
                }
            }
            if($es_primo == true){
                $primo = $candidato;
            }else{
                $es_primo = true;
            }
        }
        return $primo;
    }

    function potencia($base,$exponente){
        $potencia = 0;
        for($i = 1; $i < $exponente; $i++){
            $potencia += $base * $base;
        }
        return $potencia;
    }

    function digitos($numero){
        $digitos = 0;
        $contar = $numero;
        while($contar > 0){
            $contar = $contar/10;
            $contar = floor($contar);
            $digitos++;
        }
        return $digitos;
    }

    function voltea($numero){
        $reverso = 0;
        $operacion = $numero;
        while($operacion>0){
            //Multiplicamos el numero por 10 para que, al añadir el proximo valor del numero no se sumen
            $reverso = $reverso * 10;
            //Cogemos el ultimo numero...
            $reverso += $operacion % 10;
            $operacion = $operacion % 10;
            $operacion = floor($operacion);
        }
        return $reverso;
    }

    function digitoN($numero, $posicion){
        $contar = $numero;
        $operacion = $numero;
        $localizacion = -1; //La primera posición será 0
        $cifra = 0;

        while($contar > 0){
            $contar = $contar/10;
            $contar = floor($contar);
            $localizacion ++;
        }

        while($operacion > 0){
            $cifra = $operacion % 10;
            if($localizacion == $posicion){
                return $cifra;
            }
            $operacion = $operacion / 10;
            $operacion = floor($operacion);
            $localizacion --;
        }
    }

    function posicionDeDigito($numero, $digito){
        $posicion = -1;
        $contar = $numero;
        $operacion = $numero;
        $longitud = -1;
        $cifra = 0;
        while($contar > 0){
            $contar = $contar / 10;
            $contar = floor($contar);
            $longitud ++;
        }

        while($operacion > 0){
            $cifra = $operacion % 10;
            if($cifra == $digito){
                $posicion = $longitud;
            }
            $operacion = $operacion / 10;
            $operacion = floor($operacion);
            $longitud --;
        }
        return $posicion;
    }

    function quitaPorDetras($numero, $cantidad){
        $cortar = $numero;
        $contador = 0;

        while($contador < $cantidad){
            $cortar = $cortar / 10;
            $cortar = floor($cortar);
        }
        return $cortar;
    }

    //TODO te has quedado aquí!!
    function quitaPorDelante($numero, $cantidad){
        $numero = voltea($numero);
    }

    function pegaPorDetras($numero, $digito){

    }
?>