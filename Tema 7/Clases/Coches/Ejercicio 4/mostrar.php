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
        
        $dos = new DosRuedas("Rojo",150,null);
        $dos->addPersona(70);
        echo $dos->getPeso();
        echo "<br>";
        $dos->repintar("Verde");
        $dos->setCilindrada(1000);
        Vehiculo::ver_atributo($dos);
        echo "<br>";
        echo "<br>";

        $cami = new Camion("Blanco",6000,null,null);
        $cami->addPersona(84);
        $cami->repintar("Azul");
        $cami->setNumPuertas(2);
        Vehiculo::ver_atributo($cami);
    ?>
</body>
</html>