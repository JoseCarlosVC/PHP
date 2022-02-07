<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
        //Generamos el array
        for($i=0; $i<20; $i++){
            $numeros[$i] = rand(0,100);
        }
        //Lo mostramos antes de ordenarlo
        echo "<span>Antes de ordenar... </span><br>";
        foreach($numeros as $n){
            echo $n." ";
        }

        echo "<br>";
        //El array va a contener 20 numeros, va a ser de tamaño fijo
        $orden = new SplFixedArray(20);
        //Podemos ir decidiendo las posiciones del nuevo array manualmente con dos variables
        $principio = 0;
        $final = 19;
        for($j=0; $j<20; $j++){
            //Vamos almacenando los numeros por el principio si son pares y por el final si son impares
            if($numeros[$j]%2==0){
                $orden[$principio] = $numeros[$j];
                $principio++;
            }else{
                $orden[$final] = $numeros[$j];
                $final--;
            }
        }
        echo "<span>Despues de ordenar...</span><br>";
        foreach($orden as $m){
            echo $m." ";
        }
    ?>
</body>

</html>