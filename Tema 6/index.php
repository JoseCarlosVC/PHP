<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./funciones.inc.php");
        require_once("./funcionesArr.php");
        $numero = [1,2,3,4,5,6,7];
        $numero = rotaIzquierdaArrayInt($numero,2);
        foreach ($numero as $n){
            echo "$n <br>";
        }
    ?>
</body>
</html>