<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
        require_once("./extra.inc.php");
        echo "<h1>Ejercicio 1</h1>";
        $arr_num = [11,12,13,14,15,16,17,18,19,20];
        echo "Array original <br>"; 
        mostrar($arr_num);
        $arr_primos = moverPrimos($arr_num);
        echo "Array modificado <br>";
        mostrar($arr_primos);

        echo "<h2>Ejercicio 2</h2>";
        $decimal = 27;
        //Eñ binario se recoge como texto
        $binario = "11100";
        echo "El número decimal $decimal en binario es: ".aBinario($decimal)."<br>";
        echo "El número binario $binario en decimal es: ".aDecimal($binario)."<br>";
        
        echo "<h3>Ejercicio 3</h3>";
        //Los recogemos como texto para el calculo entre sus posiciones
        $feliz = "82";
        $no_feliz = "89";
        if(feliz($feliz)){
            echo "El número $feliz es feliz<br>";
        }else{
            echo "El número $feliz NO es feliz<br>";
        }

        if(feliz($no_feliz)){
            echo "El número $no_feliz es feliz<br>";
        }else{
            echo "El número $no_feliz NO es feliz<br>";
        }
    ?>
</body>
</html>