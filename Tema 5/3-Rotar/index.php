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
        $aux = 0;
        //Iniciamos las variables al principio del programa 
        if(!isset($numero)){
            $contador = 0;
            $texto = "";
        }
        if($contador == 15){
            $texto = $texto.",".$numero;
            $texto = substr($texto,2);
            $arr_num = explode(",",$texto);
            //Almacenamos el último valor del array
            $aux = $arr_num[count($arr_num)-1];
            for($i = (count($arr_num)-1); $i >= 0; $i--){
                //Si llegamos al principio del array, sustituimos el valor por el valor final
                if($i == 0){
                    $arr_num[$i] = $aux;
                }else{
                    $arr_num[$i] = $arr_num[$i-1];
                }
                
            }
            foreach($arr_num as $n){
                echo $n."<br>";
            }
        }
        if(($contador < 15) || (!isset($numero))){
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