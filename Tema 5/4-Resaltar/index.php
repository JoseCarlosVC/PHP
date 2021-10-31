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

        if(!isset($valor)){
            $numeros = new SplFixedArray(100);
            for($i = 0; $i < count($numeros); $i++){
                $numeros[$i] = rand(0,20);
            }
        //Necesitamos crear el array al principio del programa, al recargar la página lo pasaremos por POST junto al resto de datos
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="arr_num" value="<?php echo($numeros) ?>">
        <label>Introduce el valor a buscar</label>
        <input type="number" min="0" max="20" name="valor"><br>
        <label>Introduce el valor por el que se modificara</label>
        <input type="number" name="ocurrencia"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        }else{
            foreach($arr_num as $n){
                echo $n." ";
            }
        }
    ?>
</body>
</html>