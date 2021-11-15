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

        $numero = $_POST['numero'];
        $contador = $_POST['contador'];
        $texto = $_POST['texto'];
        //Iniciamos las variables al principio del programa 
        if(!isset($numero)){
            $contador = 0;
            $texto = "";
        }
        //Cuando se introduzcan los 10 numeros entraremos al programa
        if($contador == 10){
            $texto = $texto.",".$numero;
            var_dump($texto); //Añadimos el ultimo numero que se introdujo
            $texto = substr($texto,2);
            var_dump($texto);
            $arr_num = explode(",",$texto); //Convertimos en un array los numeros introducidos
            //Asignamos el minimo y el maximo al primer valor del array
            $min = $arr_num[0];
            $max = $arr_num[0];
            //Recorremos el array para conocer el maximo y el minimo
            foreach($arr_num as $n){
                if($n < $min){
                    $min = $n;
                }
                if($n > $max){
                    $max = $n;
                }
            }
            //Ya tenemos el maximo y el minimo; mostraremos todos los numeros
            foreach($arr_num as $m){
                if($m == $max){
                    echo $m." Máximo<br>";
                }else if($m == $min){
                    echo $m." Mínimo<br>";
                }else{
                    echo $m."<br>";
                }
            }
        }
        if(($contador < 10) || (!isset($numero))){
    ?>
    <form action="#" method="POST">
        <label>Introduzca un número</label>
        <input type="number" name="numero" autofocus required>
        <input type="hidden" name="contador" value="<?php echo ++$contador ?>">
        <input type="hidden" name="texto" value="<?php echo ($texto.",".$numero) ?>">
        <input type="submit" value="OK">
    </form>
    <?php
        }
    ?>
</body>
</html>