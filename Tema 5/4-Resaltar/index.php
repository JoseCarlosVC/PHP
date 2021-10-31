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
        $valor = $_POST['valor'];
        $ocurrencia = $_POST['ocurrencia'];
        $arr_num = $_POST['arr_num'];

        //Creamos el array de numeros al principio del programa y mostramos sus valores
        if(!isset($valor)){
            for($i = 0; $i <100; $i++){
                $numeros[$i] = rand(0,20);
            }
            //Mostramos los valores
            foreach($numeros as $n){
                echo "<span>".$n."</span>"." ";
            }
            //Para enviar el array, podemos convertirlo en un String con la función implode, cuyo funcionamiento es el contrario a la función explode usada en los anteriores ejercicios
            //Si no lo enviamos, al recargar la página se generaría un array distinto al que ya tenemos
            $str_array = implode(",",$numeros);
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="arr_num" value="<?php echo $str_array; ?>">
        <!-- El primer valor es un valor que existirá en el array; por lo tanto debe ser un valor de 0 a 20 -->
        <label>Introduce el valor a cambiar: </label>
        <input type="number" name="valor" min="0" max="20"><br>
        <label>Introduce el valor por el que será sustituido: </label>
        <input type="number" name="ocurrencia"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        }else{
            //Tenemos que convertir el String a array otra vez
            $arr_num = explode(",",$arr_num);
            //Como tenemos que comparar los valores para resaltarlos, copiamos el array para modificarlo
            $arr_copia = $arr_num;
            //Buscamos los valores y los cambiamos...
            for($j=0; $j<count($arr_copia);$j++){
                if($arr_copia[$j] == $valor){
                    $arr_copia[$j] = $ocurrencia;
                }
            }
            //Mostramos el array cambiado...
            //Foreach no permite recorrer dos arrays a la vez, usaremos un for normal entonces
            for($k=0; $k<count($arr_num);$k++){
                //Si son iguales nada más que los mostramos, si no son iguales...
                if($arr_num[$k]==$arr_copia[$k]){
                    echo $arr_copia[$k]." ";
                }else{
                    echo "<span style='background-color:#FF4C4C;'>".$arr_copia[$k]."</span> ";
                }
            }
        }
    ?>
</body>
</html>