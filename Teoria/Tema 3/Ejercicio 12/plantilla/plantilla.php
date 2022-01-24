<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
	Ejercicio 12: En esta ocasión es necesario crear un
    nuevo formulario en la página, en la sección donde se
    muestra el número de unidades por tienda. Cuando se
    envía ese formulario, hay que preparar la consulta y
    ejecutarla una vez por cada registro de la tabla stock
    (una vez por cada tienda en la que exista stock de ese
    producto).
-->

<body>
    <?php
        $dwes = new mysqli('localhost','jose','aa','dwes');
        $error = $dwes->connect_errno;
        if($error != null){
            echo "error";
            exit();
        }else{
            echo "exito";
            $consulta = $dwes->stmt_init();
        }
?>

    <div id="encabezado">
        <h1>Ejercicio: </h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="menu">;
                <?php
                $consulta->prepare('SELECT nombre_corto,cod FROM producto');
                $consulta->execute();
                $consulta->bind_result($nombre,$codigo);
                while($consulta->fetch()){
                    echo "<option value='$codigo'>$nombre</option>";
                }
                $consulta->close();
			?>
            </select>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </div>

    <?php
    //Si he seleccionado un producto, muestro su stock
        if(isset($_POST['enviar'])){
            $codigo = $_POST['menu'];
            $resultado = $dwes->stmt_init();

            /* SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE producto.cod='3DSNG' AND stock.producto='3DSNG' AND tienda.cod=stock.tienda*/
            $resultado->prepare("SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE producto.cod='$codigo' AND stock.producto='$codigo' AND tienda.cod=stock.tienda");
            $resultado->execute();
            $resultado->bind_result($nombre_corto,$nombre_tienda,$unidades);   
    ?>
    <div id="contenido">
        <h2>Contenido</h2>
            <table>
                <tr>
                    <th>Nombre_corto</th>
                    <th>Tienda</th>
                    <th>Stock</th>
                </tr>
    <?php
        while($resultado->fetch()){
            echo "<tr>";
                echo "<td>$nombre_corto</td>";
                echo "<td>$nombre_tienda</td>";
                echo "<td>$unidades</td>";
            echo "</tr>";
        }
        $resultado->close();
    ?>
            </table>
    </div>
    <?php
        }
    ?>
    <div id="pie">
    </div>
    <?php
        $dwes->close();
    ?>
</body>

</html>