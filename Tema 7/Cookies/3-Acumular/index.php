<?php
    if(isset($_POST['enviar'])){
        $total = $_COOKIE['total'];
        $contador = $_COOKIE['contador'];
        if($total <= 10000){
            $numero = $_POST['numero'];
            $contador++;
            $total+=$numero;
            setcookie('total',$total, time() + 24*60*60);
            setcookie('contador',$contador, time() + 24*60*60);
        }else{
            $media = $total / $contador;
            setcookie('total',NULL, -1);
            setcookie('contador',NULL, -1); 
        }
    }else{
        setcookie('total',0, time() + 24*60*60);
        setcookie('contador',0, time() + 24*60*60);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        /**
         * Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
         *  su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
         * el contador de los números introducidos y la media. Utiliza sesiones.
         */
        if (isset($media)){
            echo "<p>Se han introducido $contador números</p>";
            echo "<p>La suma total es $total</p>";
            echo "<p>La media es de $media</p>";
        }
    ?>
    <form action="#" method="post">
        <label for="numero">Introduce un número: </label>
        <input type="number" name="numero" autofocus>
        <br>
        <input type="submit" name="enviar" value="Enviar número">
    </form>
</body>
</html>