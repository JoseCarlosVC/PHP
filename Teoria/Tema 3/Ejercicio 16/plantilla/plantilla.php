<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
    Ejercicio 16: Modifica la página web que muestra el stock
    de un producto en las distintas tiendas, obtenida en un
    ejercicio anterior utilizando MySQLi, para que use PDO.
    Omite la gestión de errores, que veremos en el último
    punto de este tema.
-->

<body>
    <?php
        $dwes = new PDO('mysql:host=localhost;dbname=dwes','jose','aa');
?>
    <div id="encabezado">
        <h1>Ejercicio: </h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="menu">;
                <?php
                $consulta = $dwes->query('SELECT nombre_corto,cod FROM producto');
                while($resultado = $consulta->fetch()){
                    echo "<option value='".$resultado['cod']."'>".$resultado['nombre_corto']."</option>";
                }
                $resultado = null;
                $consulta = null;
			?>
            </select>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </div>

    <?php
    //Si he seleccionado un producto, muestro su stock
        if(isset($_POST['enviar'])){
            $codigo = $_POST['menu'];
            /* SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE producto.cod='3DSNG' AND stock.producto='3DSNG' AND tienda.cod=stock.tienda*/
            $producto = $dwes->query("SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE producto.cod='$codigo' AND stock.producto='$codigo' AND tienda.cod=stock.tienda");
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
        while($stock = $producto->fetch()){
            echo "<tr>";
                echo "<td>".$stock['nombre_corto']."</td>";
                echo "<td>".$stock['nombre']."</td>";
                echo "<td>".$stock['unidades']."</td>";
            echo "</tr>";
        }
        $producto = null;
        $stock = null;
    ?>
            </table>
    </div>
    <?php
        }
    ?>
    <div id="pie">
    </div>
    <?php
        $dwes = null;
    ?>
</body>

</html>