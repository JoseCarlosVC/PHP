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
        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            var_dump($nombre);
            $texto = "abcdefghijk";
            for($i=0; $i<strlen($texto); $i++){
                echo $texto[$i]."  $i <br>";
            }
            if(strpos($texto,$nombre) !== false){
                echo "Está";
            }
        }else{
    ?>
    <form action="#" method="POST">
        <input type="text" name="nombre"><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>