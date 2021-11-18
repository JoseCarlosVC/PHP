<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="./ejercicios.css" type="text/css" rel="stylesheet"> -->
    <title>Document</title>
</head>
<body>
    <?php
        if(!empty($_POST['agenda'])){
            $agenda = $_POST['agenda'];
            $agenda[$_POST['nombre']] = $_POST['tlf'];
            //array_push($agenda, array($_POST['nombre'] => $_POST['tlf']));
        }else if(!empty($_POST['nombre'])){
            $agenda = array($_POST['nombre'] => $_POST['tlf']);
        }else{
            $agenda = $_POST['agenda'];
        }
        //$agenda = $_POST['agenda'];
        $contador = $_POST['contador'];
        if(!isset($contador)){
            $contador = 0;
            $agenda = array();
        }
        if($contador == 4){
            echo "Contador = 2, final del ejercicio <br>";
            var_dump($agenda);
            echo "<br>";
            print_r($agenda)."<br>";
        }else{
    ?>
    <form action="#" method="POST">
        <?php
        echo "Aqui";
        if(!empty($agenda)){
            foreach($agenda as $clave => $valor){
                echo $clave;
                echo $valor;
                echo "<input type='hidden' name='agenda[$clave]' value='$valor'>";
            }
        } 
        ?>
        <input type="hidden" name="contador" value="<?php echo ++$contador ?>">
        <label>Introduce un nombre: </label>
        <input type="text" name="nombre" required autofocus><br>
        <label>Introduce el número de teléfono: </label>
        <input type="number" name="tlf"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        }
    ?>
<!-- https://www.phpexercises.com/php-associative-array-exercise.html -->
<!-- https://shareurcodes.com/blog/randomize%20%20multidimensional%20associative%20array%20in%20php -->
</body>
</html>
