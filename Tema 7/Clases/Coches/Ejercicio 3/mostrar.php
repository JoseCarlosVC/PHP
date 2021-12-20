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
        include_once("./vehiculo.php");
        include_once("./dosRuedas.php");
        include_once("./cuatroRuedas.php");
        include_once("./coche.php");
        include_once("./camion.php");
        
        $vehi = new Coche("Verde",1400,5,4);
        var_dump($vehi);
        echo "<br>";
        $vehi->addPersona(65);
        echo "<br>";
        echo $vehi->getPeso();
        $vehi->addPersona(65);
        echo "<br>";
        echo $vehi->getPeso();
        echo "<br>";
        echo $vehi->getColor();
        echo "<br>";
        $vehi->repintar("Rojo");
        echo "<br>";
        echo $vehi->getColor();
        echo "<br>";
        $vehi->addCadenasNieve(2);
        echo $vehi->getNumCadenasNieve();
        echo "<br>";
        echo "<br>";

        $dos = new DosRuedas("Negro",120,0);
        $dos->addPersona(80);
        $dos->ponerGasolina(20);
        echo $dos->getColor();
        echo "<br>";
        echo $dos->getPeso();
        echo "<br>";
        echo "<br>";

        
        $cam = new Camion("Azul",10000,2,10);
        $cam->addRemolque(5);
        $cam->addPersona(80);
        echo $cam->getColor();
        echo "<br>";
        echo $cam->getPeso();
        echo "<br>";
        echo $cam->getLongitud();
        echo "<br>";
        echo $cam->getNumPuertas();
    ?>
</body>
</html>