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
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        include_once("./vehiculo.php");
        include_once("./dosRuedas.php");
        include_once("./cuatroRuedas.php");
        include_once("./coche.php");
        include_once("./camion.php");
        $coche = new Coche("Azul", 700, 5, 4);
        $coche->circula();
        echo "<br>";
        var_dump($coche);
        echo "<br>";
        echo $coche->getColor();
        echo "<br>";
        echo $coche->getPeso();
        echo "<br>";
        echo $coche->getNumPuertas();
        echo "<br>";
        echo $coche->getNumCadenasNieve();
        echo "<br>";
        $coche->__destruct();
        var_dump($coche);
    ?>
</body>
</html>