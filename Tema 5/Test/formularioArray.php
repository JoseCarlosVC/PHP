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
        $n = $_GET['n'];
        $contadorNumeros = $_GET['contadorNumeros'];
        $numeroTexto = $_GET['numeroTexto'];
        if (!isset($n)) {
            $contadorNumeros = 0;
            $numeroTexto = "";
        }
        // Muestra los números introducidos
        if ($contadorNumeros == 6) {
            $numeroTexto = $numeroTexto . "," . $n; // añade el último número leído
            $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
                                                    // espacios de la cadena
            $numero = explode(",", $numeroTexto);
            echo "Los números introducidos son: ";
            foreach ($numero as $n) {
                echo $n, ",";
            }
            //var_dump($numero);
        }
            // Pide número y añade el actual a la cadena
        if (($contadorNumeros < 6) || (!isset($n))) {
    ?>
    <form action="#" method="get">
        Introduzca un número:
        <input type="number" name ="n" autofocus>
        <input type="hidden" name="contadorNumeros" value="<?php echo ++$contadorNumeros ?>">
        <input type="hidden" name="numeroTexto" value="<?php echo ($numeroTexto.",".$n) ?>">
        <input type="submit" value="OK">
    </form>
    <?php
        }
    ?>
</body>
</html>