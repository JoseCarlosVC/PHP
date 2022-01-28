<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
    Ejercicio 18: Modifica el ejercicio sobre consultas
    preparadas que realizaste con la extensión MySQLi, el
    que modificaba el número de unidades de un producto
    en las distintas tiendas, para que utilice ahora la
    extensión PDO.
-->

<body>
    <?php
        $dwes = new PDO('mysql:host=localhost;dbname=dwes','jose','aa');
?>
    <div id="encabezado">
        <h1>Ejercicio: </h1>
        <?php
            if(isset($_POST['enviar'])){
                //Si se han introducido todos los datos del formulario, actualizo la tabla
                if(isset($_POST['tienda']) && isset($_POST['producto']) && isset($_POST['cantidad'])){
                    $tienda = $_POST['tienda'];
                    $producto = $_POST['producto'];
                    $cantidad = $_POST['cantidad'];
                    //Pueden darse dos casos, insertar una nueva línea en la tabla stock o actualizar una existente
                    $consulta = $dwes->query("SELECT producto,tienda,unidades FROM stock WHERE producto='$producto' AND tienda=$tienda");
                    if($resultado = $consulta->fetch()){
                        //Si existe, UPDATE
                        $actualizar = $dwes->prepare("UPDATE stock SET unidades=:cantidad WHERE producto=:producto AND tienda=:tienda");
                        $actualizar->bindParam(":cantidad",$cantidad);
                        $actualizar->bindParam(":producto",$producto);
                        $actualizar->bindParam(":tienda",$tienda);
                        $actualizar->execute();
                        $actualizar = null;
                    }else{
                        //Si no existe, INSERT
                        $insertar = $dwes->prepare("INSERT INTO stock VALUES (:producto,:tienda,:unidades)");
                        $insertar->bindParam(":producto",$producto);
                        $insertar->bindParam(":tienda",$tienda);
                        $insertar->bindParam(":unidades",$cantidad);
                        $insertar->execute();
                        $insertar = null;
                    }

                    $consulta = null;
                    $tienda = null;
                    $producto = null;
                    $cantidad = null;
                    $resultado = null;
                }
            }
        ?>
            <table>
                <tr>
                    <th>Nombre_Corto</th>
                    <th>Nombre_Tienda</th>
                    <th>Unidades</th>
                </tr>       
                <?php
                $consulta = $dwes->query('SELECT producto.nombre_corto,tienda.nombre,stock.unidades FROM producto,stock,tienda WHERE stock.tienda=tienda.cod AND producto.cod=stock.producto ORDER BY nombre_corto');
                while($resultado = $consulta->fetch()){
                    echo "<tr>";
                        echo "<td>".$resultado['nombre_corto']."</td>";
                        echo "<td>".$resultado['nombre']."</td>";
                        echo "<td>".$resultado['unidades']."</td>";
                    echo "</tr>";
                }
                $resultado = null;
                $consulta = null;
			?>
            </table>
    </div>

    <div id="contenido">
        <h2>Contenido</h2>
        <form action="#" method="post">
            <select name="tienda">
                <?php
                    $tiendas = $dwes->query('SELECT cod,nombre FROM tienda');
                    while($resultado = $tiendas->fetch()){
                ?>
                    <option <?php if(isset($_POST['enviar']) && isset($_POST['tienda']) && ($resultado['cod']==$_POST['tienda'])){
                            echo 'selected';
                        } ?> value="<?php echo $resultado['cod'];?>"><?php echo $resultado['nombre'];?></option>
                <?php
                    }
                    $resultado = null;
                    $tiendas = null;
                ?>
            </select>
            <select name="producto">
                <?php
                    $productos = $dwes->query('SELECT cod,nombre_corto FROM producto');
                    while($resultado = $productos->fetch()){
                ?>
                    <option <?php if(isset($_POST['enviar']) && isset($_POST['producto']) && ($resultado['cod']==$_POST['producto'])){
                            echo 'selected';
                        } ?> value="<?php echo $resultado['cod'];?>"><?php echo $resultado['nombre_corto'];?></option>";
                <?php
                    }
                    $resultado = null;
                    $productos = null;
                ?>
            </select>
            <br>
            <label for="cantidad">Unidades del producto: </label>
            <input type="number" name="cantidad" min="0" size="5" value="<?php
                if(isset($_POST['enviar']) && isset($_POST['cantidad'])){
                    echo $_POST['cantidad'];
                }
            ?>">
            <br>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </div>
    <div id="pie">
    </div>
    <?php
        $dwes = null;
    ?>
</body>

</html>