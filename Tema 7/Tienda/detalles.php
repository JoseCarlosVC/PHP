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
    if (isset($_GET['cod'])) {
        require_once("./app/conexion.inc.php");
        $conexion = Conexion::openConexion();
        $cod = $_GET['cod'];
        $detalles = $conexion->query("SELECT cod,nombre,descripcion,precio,imagen FROM producto WHERE cod=$cod");
        $stock = $detalles->fetch_assoc();
    ?>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($stock['imagen']); ?>" alt="" srcset="" width="250px" height="250px">
        <br>
        <span class="nombre"><?php echo $stock['nombre']; ?></span>
        <br>
        <span class="precio"><?php echo $stock['precio']; ?></span>
        <br>
        <span class="descripcion"><?php echo $stock['descripcion']; ?></span>
        <br>
        <a href="./tienda.php?cod=<?php echo $stock['cod']; ?>" class="comprar">Comprar</a>

    <?php
        $conexion = Conexion::closeConexion();
    }
    ?>
</body>

</html>