<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = $_POST['numero'];
        $contador = $_POST['contador'];
        $texto = $_POST['texto'];

        if(!isset($numero)){
            $contador = 0;
            $texto = "";
        }

        if($contador == 8){
            $texto = $texto.",".$numero;
            $texto = substr($texto,2);
            $arr_num = explode(",",$texto);
            foreach($arr_num as $n){
                if($n%2==0){
                    echo "<span style='background-color:#7fffd4;'>".$n."</span> ";
                }else{
                    echo "<span style='background-color:#03bb85;'>".$n."</span> ";
                }
            }

        }else{
    ?>
    <form action="#" method="POST">
        <label>Introduce un número</label>
        <input type="number" name="numero" autofocus required>
        <input type="hidden" name="contador" value="<?php echo ++$contador; ?>">
        <input type="hidden" name="texto" value="<?php echo($texto.",".$numero) ?>">
        <input type="submit" value="Enviar">
        </form>
    <?php
        }
    ?>
</body>
</html>