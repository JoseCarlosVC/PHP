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

        ini_set("default_charset", "UTF-8");
        mb_internal_encoding("UTF-8");
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $nombre = iconv("UTF-8","ISO-8859-1",$nombre);
            var_dump($nombre);
        }
    ?>
    <form action="#" method="POST">
        <input type="text" name="nombre" autofocus><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>