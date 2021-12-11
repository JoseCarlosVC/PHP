<?php
    if (isset($_POST['enviar'])) {
        $numero = $_POST['numero'];
        $contador = $_COOKIE['contador'];
        $contimp = $_COOKIE['contimp'];
        $mediaimp = $_COOKIE['mediaimp'];
        $maypar = $_COOKIE['maypar'];
        if ($numero >= 0) {
            $contador++;
            if ($numero % 2 == 0) {
                if($maypar < $numero){
                    $maypar = $numero;
                }
            } else {
                $contimp++;
                $mediaimp += $numero;
            }
            setcookie('contador',$contador,time() + 24*60*60);
            setcookie('contimp',$contimp, time() + 24*60*60);
            setcookie('mediaimp',$mediaimp, time() + 24*60*60);
            setcookie('maypar',$maypar, time() + 24*60*60);
        } else {
            //Recogemos los datos para mostrarlos
            $contador = $_COOKIE['contador'];
            $contimp = $_COOKIE['contimp'];
            $mediaimp = $_COOKIE['mediaimp'];
            $maypar = $_COOKIE['maypar'];
            $media = $mediaimp / $contimp;
            setcookie('contador',NULL,-1);
            setcookie('contimp',NULL, -1);
            setcookie('mediaimp',NULL, -1);
            setcookie('maypar',NULL, -1);
        }
    }else{
        setcookie('contador',0,time() + 24*60*60);
        setcookie('contimp',0, time() + 24*60*60);
        setcookie('mediaimp',0, time() + 24*60*60);
        setcookie('maypar',0, time() + 24*60*60);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
    /**
     * Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
     * nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
     * número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
     * en el cómputo. Utiliza sesiones.
     */
    if (isset($media)){
        echo "<p>Se han introducido $contador números</p>";
        echo "<p>La media de los impares es $media</p>";
        echo "<p>El número par mayor es $maypar</p>";
    }
    ?>
    <form action="#" method="post">
        <label for="numero">Introduce un número: </label>
        <input type="number" name="numero" autofocus>
        <br>
        <input type="submit" name="enviar" value="Enviar número">
    </form>
</body>

</html>