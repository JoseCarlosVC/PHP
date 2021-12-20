<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    if(isset($_POST['numero'])){
        $numero = $_POST['numero'];
    }
    if(isset($_POST['cadena'])){
        $cadena = $_POST['cadena'];
    }
    if(!isset($_POST['enviarNum'])){
?>
    <form action="#" method="post">
        <label for="numero">Introduce un número</label><br>
        <input type="number" name="numero" min="1" autofocus><br>
        <input type="submit" value="Enviar" name="enviarNum">
    </form>
    <?php
    }else if (!isset($_POST['enviarCad'])){
        
?>
    <form action="#" method="post">
        <input type="hidden" name="numero" value="<?php echo $numero; ?>">
        <input type="hidden" name="enviarNum" value="<?php echo true; ?>">
        <label for="cadena">Introduce la cadena a cifrar</label><br>
        <input type="text" name="cadena" autofocus><br>
        <input type="submit" name="enviarCad" value="Enviar">
    </form>
    <?php
    }else{

        $cifrado = "";
        $caracter = "";

        for($i=0;$i<strlen($cadena);$i++){
            $caracter = ord($cadena[$i]);
            $caracter += $numero;
            $cifrado .= chr($caracter);
        }
        echo "La cadena cifrada: $cifrado";
    }
?>
</body>

</html>