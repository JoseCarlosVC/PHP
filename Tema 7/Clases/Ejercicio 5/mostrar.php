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
        
        $coche = new Coche("Verde",2100,4,0);
        $coche->addCadenasNieve(2);
        $coche->addPersona(80);
        $coche->setColor("Azul");
        $coche->quitarCadenasNieve(4);
        $coche->setColor("Negro");
        Vehiculo::ver_atributo($coche);
    ?>
</body>
</html>