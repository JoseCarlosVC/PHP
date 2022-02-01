<!DOCTYPE html>
<html lang="es-es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/actualizar.css">
    <title>Actualizar Productos</title>
</head>
<body>
    <?php
        require_once("./lib/conexion.inc.php");
        $conexion = Conexion::openConexion();
        if(!isset($_POST['enviarFamilia'])){
    ?>
        <form action="#" method="post">
            <select name="familia">
                <?php
                    try{
                        $consulta = $conexion->query('SELECT cod,nombre FROM familia');
                        while($familia = $consulta->fetch()){
                ?>
                <option value="<?php echo $familia['cod']; ?>"><?php echo $familia['nombre']; ?></option>
                <?php
                        }
                    }catch(PDOException $err){
                        echo "Error consultando la tabla familia". $err->getMessage();
                    }
                ?>
            </select>
            <input type="submit" name="enviarFamilia" value="Consultar">
        </form>
    <?php
        }else{
    ?>
        <table></table>
    <?php
        }
        $conexion = Conexion::closeConexion();
    ?>
</body>
</html>