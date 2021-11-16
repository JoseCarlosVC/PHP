<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        $agenda = $_POST['agenda'];
        if(isset($agenda)){
            $agenda = array_push($agenda, array($_POST['nombre'] => $_POST['tlf']));
        }
        $contador = $_POST['contador'];
        if(!isset($contador)){
            $contador = 0;
            $agenda = array();
        }
        if($contador == 3){
            print_r($agenda)."<br>";
        }else{
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="agenda[]" value="<?php print_r($agenda) ?>">
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
</body>
</html>