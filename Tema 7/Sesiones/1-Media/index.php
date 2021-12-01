<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include_once './controlSesion.php';
    const CUENTA = array('usuario' => 'jose', 'password' => 'aa');
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
     * Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
     * teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
     * terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.
    */
    if(isset($_POST['Enviar'])){
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
    }
    ?>
</body>
</html>