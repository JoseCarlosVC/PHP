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
        include_once("./vehiculo.php");
        include_once("./dosRuedas.php");
        include_once("./cuatroRuedas.php");
        include_once("./coche.php");
        include_once("./camion.php");
        
        $vehi = new Vehiculo("Negro",1500);
        var_dump($vehi);
        echo "<br>";
        $vehi->circula();
        echo "<br>";
        $vehi->addPersona(70);
        var_dump($vehi);
        echo "<br>";
        echo $vehi->getPeso();
    ?>
</body>
</html>