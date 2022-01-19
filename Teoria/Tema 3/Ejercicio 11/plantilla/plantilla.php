<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
	Ejercicio 11: Crea una página web en la que se muestre el
	stock existente de un determinado producto en cada una de
	las tiendas. Para seleccionar el producto concreto utiliza un
	cuadro de selección dentro de un formulario en esa misma
	página.
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
        }
?>

    <div id="encabezado">
        <h1>Ejercicio: </h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="menu">;
                <?php
                $consulta = $dwes->query('SELECT nombre_corto,cod FROM producto');
                $producto = $consulta->fetch_object();
                while($producto != null){
                    echo "<option value='$producto->cod'>$producto->nombre_corto</option>";
                    $producto = $consulta->fetch_object();
                }
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
            $stock = $dwes->query("SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE producto.cod='$codigo' AND stock.producto='$codigo' AND tienda.cod=stock.tienda");
            $unidad = $stock->fetch_object();    
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
        while($unidad != null){
            echo "<tr>";
                echo "<td>$unidad->nombre_corto</td>";
                echo "<td>$unidad->nombre</td>";
                echo "<td>$unidad->unidades</td>";
            echo "</tr>";
            $unidad = $stock->fetch_object();
        }
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