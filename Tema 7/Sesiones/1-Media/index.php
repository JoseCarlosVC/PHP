<?php
    error_reporting(E_ALL);

    if(session_id() == ''){
        session_start();
        if (!isset($_SESSION['total'])){
            $_SESSION['total'] = 0;
        }
        if(!isset($_SESSION['contador'])){
            $_SESSION['contador'] = 0;
        }
        //var_dump($_SESSION['total']);
        
    }
    /*if(isset($_POST['inicio'])){
        $inicio = $_POST['inicio'];
    }
    if(!isset($inicio)){
        echo "Inicio sesión";
        session_start();
        $inicio = true;
*/

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
        $numIntro = $_POST['numIntro'];
        if($numIntro > 0){
            //echo "Entro aqui";
            $_SESSION['total'] += $numIntro;
            //var_dump($_SESSION['total']);

            $_SESSION['contador'] += 1;
        }else{
            //echo "Entro en el else";
            //var_dump($_SESSION['total']);
            
            //var_dump(($_SESSION['contador']));
            $contador = $_SESSION['contador'];
            $media = $total/$contador;
            echo $_SESSION['total']/$_SESSION['contador'];
            unset($_SESSION['total']);
            unset($_SESSION['contador']);
            session_destroy();
        }
    }
    ?>
    <form action="#" method="POST">
        <label>Introduce un número</label>
        <input type="number" name="numIntro" autofocus><br>
        <input type="submit" value="Enviar" name="Enviar">
    </form>
</body>
</html>