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
        require_once("./conversiones.inc.php");
        $binario = $_POST['binario'];
        $decimal = $_POST['decimal'];
        if(isset($binario)){
            echo "El número decimal $decimal en binario es: ".aBinario($decimal)."<br>";
            echo "El número binario $binario en decimal es: ".aDecimal($binario)."<br>";
        }else{
    ?>
    <form action="#" method="POST">
        <label>Introduce un número decimal:</label>
        <input type="number" name="decimal"><br>
        <label>Introduce un número binario: </label>
        <!-- Si recogemos el binario como texto, luego será mucho más cómodo realizar la conversión -->
        <input type="text" name="binario" pattern="(?=.*[0-1])[0-1]*"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>