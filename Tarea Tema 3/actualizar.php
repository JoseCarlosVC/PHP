<?php
if (isset($_POST['actualizar'])) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once("./app/conexion.inc.php");
    $conexion = Conexion::openConexion();

    $codigo = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion = $_POST['descripcion'];
    $PVP = $_POST['PVP'];
    try {
        $actualizar = $conexion->prepare("UPDATE producto SET nombre=:nombre, nombre_corto=:nombre_corto, descripcion=:descripcion, PVP=:PVP WHERE cod='$codigo'");
        $actualizar->bindParam(":nombre", $nombre);
        $actualizar->bindParam(":nombre_corto", $nombre_corto);
        $actualizar->bindParam(":descripcion", $descripcion);
        $actualizar->bindParam("PVP", $PVP);
        $actualizar->execute();
        $actualizar = null;
        $conexion = Conexion::closeConexion();
    } catch (PDOException $err) {
        echo "Error actualizando el producto " . $err->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1;url=./listado.php">
    <link rel="stylesheet" href="./css/actualizar.css">
    <title>Document</title>
</head>

<body>

</body>

</html>