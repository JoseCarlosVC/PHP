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
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        if(!isset($numero)){
            $contador = 0;
            $texto = "";
        }
        //Si se han introducido las variables y son correctas
        if(isset($inicio) && ($inicio < $fin)){
            $arr_num = explode(",",$texto);
            for($j = $inicio; $j<$fin; $j++){
                //Daremos una vuelta completa al array tantas veces como diferencia haya entre el principio y el fin
                //Usamos la misma lógica que en el ejercicio 3
                $aux = $arr_num[9];
                for($k = 9; $k >= 0; $k--){
                    if($k == 0){
                        $arr_num[$k] = $aux;
                    }else{
                        $arr_num[$k] = $arr_num[$k-1];
                    }
                    
                }
                
            }
            //Mostramos el array modificado
            for($l=0; $l<10; $l++){
                echo $l." ".$arr_num[$l]."<br>";
            }
        }else if($contador == 10){
            $texto = $texto.",".$numero;
            $texto = substr($texto,2);
            $arr_num = explode(",",$texto); 
            for($i=0; $i<10; $i++){
                echo $i." ".$arr_num[$i]."<br>";
            }
    ?>
            <form action="#" method="POST">
                <label>Introduce la posicion del principio: </label>
                <input type="number" name="inicio" min="0" max="8"><br>
                <label>Introduce la posición del final: </label>
                <input type="number" name="fin" min="1" max="9"><br>
                <input type="hidden" name="texto" value="<?php echo $texto ?>">
                <!-- En estos dos formularios se usa el valor del número para que,
                    cuando volvamos a enviar el formulario no se reinicie el valor de texto-->
                <input type="hidden" name="numero" value="<?php echo $numero ?>">
                <input type="submit" value="Enviar">
            </form>
    <?php
        }else if( isset($fin) && ($fin <= $inicio)){
    ?>
        <form action="#" method="POST">
            <label>Introduce la posicion del principio: </label>
            <input type="number" name="inicio" min="0" max="8"><br>
            <label>Introduce la posición del final: </label>
            <input type="number" name="fin" min="1" max="9"><br>
            <input type="hidden" name="texto" value="<?php echo $texto  ?>">
            <input type="hidden" name="numero" value="<?php echo $numero ?>">
            <input type="submit" value="Enviar">
        </form>
    <?php
        }else{
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