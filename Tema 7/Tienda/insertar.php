<?php
    if(isset($_POST['enviar'])){
        $comprobar = getimagesize($_FILES['imagen']['tmp_name']);
        if($comprobar !== false){
            $imagen = $_FILES['imagen']['tmp_name'];
            $imgDatos = addslashes(file_get_contents($imagen));

            require_once('./lib/conexion.inc.php');
            $conexion = Conexion::openConexion();
            $consulta = $conexion->stmt_init();
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
        <input type="text" name="nombre" required>
        <label for="descripcion">Introudce la descripción del producto: </label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <label for="precio">Introduce el precio del producto: </label>
        <input type="number" name="precio">
        <label for="imagen">Sube una imagen:</label>
        <input type="file" name="imagen">
        <input type="submit" name="enviar" value="Subir">
    </form>
</body>
</html>