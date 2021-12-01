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
        $otro = $_POST['otro'];
        if(isset($_POST['nombre'])){
            echo "Esta set";
        }
        if(!empty($_POST['nombre'])){
            echo "No esta vacio";
        }
    ?>
    <form action="#" method="POST">
        <input type="text" name="nombre" placeholder="nombre"><br>
        <input type="text" name="otro" placeholder="otro">
        <input type="submit" value="enviar">
    </form>
</body>
</html>