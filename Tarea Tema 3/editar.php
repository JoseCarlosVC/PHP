<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/actualizar.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('./app/conexion.inc.php');
    $conexion = Conexion::openConexion();
    $codProducto = $_GET['codProducto'];
    try {
        $consulta = $conexion->query("SELECT nombre_corto,nombre,descripcion,PVP FROM producto WHERE cod='$codProducto'");
        $producto = $consulta->fetch();
    } catch (PDOException $err) {
        echo "Error consultando la tabla productos " . $err->getMessage();
        exit();
    }

    ?>
    <form action="./actualizar.php" method="post">
        <input type="hidden" name="cod" value="<?php echo $codProducto; ?>">
        <label for="nombre">Nombre del producto: </label>
        <br>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>">
        <br>
        <br>
        <label for="nombre_corto">Nombre corto del producto</label>
        <br>
        <input type="text" name="nombre_corto" value="<?php echo $producto['nombre_corto']; ?>">
        <br>
        <br>
        <label for="descripcion">Descripción del producto: </label>
        <br>
        <textarea name="descripcion"><?php echo $producto['descripcion']; ?></textarea>
        <br>
        <br>
        <label for="PVP">Precio del producto: </label>
        <br>
        <input type="number" name="PVP" value="<?php echo $producto['PVP']; ?>">
        <br>
        <br>
        <input type="submit" value="Actualizar" name="actualizar">
        <br>
        <input type="submit" value="Cancelar" name="cancelar">
        <br>
    </form>
    <?php
    $conexion = Conexion::closeConexion();
    ?>
</body>

</html>