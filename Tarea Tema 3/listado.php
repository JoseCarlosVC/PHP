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
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
        require_once("./lib/conexion.inc.php");
        $conexion = Conexion::openConexion();
        if(!isset($_POST['enviarFamilia'])){
    ?>
        <form action="#" method="post">
            <select name="familia">
                <?php
                    try{
                        
                        $consulta = $conexion->query('SELECT familia FROM producto');
                        while($familia = $consulta->fetch()){
                ?>
                <option value="<?php echo $familia['familia']; ?>"><?php echo $familia['familia']; ?></option>
                <?php
                        }
                    }catch(PDOException $err){
                        echo "Error consultando la tabla familia". $err->getMessage();
                    }
                    $consulta = null;
                    $familia = null;
                ?>
            </select>
            <input type="submit" name="enviarFamilia" value="Consultar">
        </form>
    <?php
        }else{
            $codFamilia = $_POST['familia'];
    ?>
        <table>
            <tr>
                <th>Nombre corto</th>
                <th>PVP</th>
                <th>¿Editar?</th>
            </tr>
    <?php
        try{
            $consulta = $conexion->query("SELECT cod,nombre_corto,PVP FROM producto WHERE familia='$codFamilia'");
            while($producto = $consulta->fetch()){
    ?>
            <tr>
                    <td><?php echo $producto['nombre_corto']; ?></td>
                    <td><?php echo $producto['PVP']; ?></td>
                    <td><a href="./editar.php?codProducto=<?php echo $producto['cod']?>">Editar</a></td>
            </tr>
    <?php
            }
        }catch(PDOException $err){
            echo "Error consultando la tabla producto". $err->getMessage();
        }
    ?>
        </table>
    <?php
        }
        $conexion = Conexion::closeConexion();
    ?>
</body>
</html>