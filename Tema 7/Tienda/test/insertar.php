<?php

if (isset($_POST['enviar'])) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $comprobar = getimagesize($_FILES['imagen']['tmp_name']);
    if ($comprobar !== false) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imgDatos = addslashes(file_get_contents($imagen));

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        include_once '../app/conexion.inc.php';

        $conexion = Conexion::openConexion();
        try {
            $consulta = $conexion->query("INSERT INTO producto (nombre,descripcion,precio,imagen) VALUES ('$nombre','$descripcion','$precio','$imgDatos')");
            if ($consulta) {
                echo "Datos subidos correctamente";
            } else {
                echo "Error";
            }
        } catch (mysqli_sql_exception $err) {
            echo "ERROR: " . $err->getMessage();
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="nombre">Introduce el nombre del producto: </label>
        <br>
        <input type="text" name="nombre" required>
        <br>
        <br>
        <label for="descripcion">Introudce la descripción del producto: </label>
        <br>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <br>
        <br>
        <label for="precio">Introduce el precio del producto: </label>
        <br>
        <input type="number" name="precio" step=".01">
        <br>
        <br>
        <label for="imagen">Sube una imagen:</label>
        <br>
        <input type="file" name="imagen">
        <br>
        <br>
        <input type="submit" name="enviar" value="Subir">
        <br>
    </form>
</body>

</html>