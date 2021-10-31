<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Potencias</title>
</head>
<body>
    <?php
        //Declaramos los 3 arrays con tamaño fijo
        $numero = new SplFixedArray(20);
        $cuadrado = new SplFixedArray(20);
        $cubo = new SplFixedArray(20);

        //En el primer array declaramos los numeros aleatorios
        for($i = 0; $i < 20; $i++){
            $numero[$i] = rand(0,100);
        }
        //En el segundo los cuadrados y en el tercero sus cubos...
        for($j = 0; $j < 20; $j++){
            $cuadrado[$j] = $numero[$j] * $numero[$j];
        }

        for($k = 0; $k < 20; $k++){
            $cubo[$k] = $numero[$k] * $numero[$k] * $numero[$k];
        }

        echo "<table>";
            for($l = 0; $l < 20; $l++){
                echo "<tr><td>".$numero[$l]."</td><td>".$cuadrado[$l]."</td><td>".$cubo[$l]."</td></tr>";
            }
        echo "</table>";
    ?>
</body>
</html>