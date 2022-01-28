<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
    Ejercicio 19: Agrega control de excepciones para
    controlar los posibles errores de conexión que se
    puedan producir en el último ejercicio, mostrando en la
    parte inferior de la pantalla los errores que se
    produzcan.
-->

<body>
    <?php
        try {
            $dwes = new PDO('mysql:host=localhost;dbname=dwes','jose','aa');
        }catch(PDOException $ex){
            print 'ERROR de conexión: ' . $ex->getMessage();
            exit();
        }
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
                    try{
                        $consulta = $dwes->query("SELECT producto,tienda,unidades FROM stock WHERE producto='$producto' AND tienda=$tienda");
                        if($resultado = $consulta->fetch()){
                            try{
                                //Si existe, UPDATE
                                $actualizar = $dwes->prepare("UPDATE stock SET unidades=:cantidad WHERE producto=:producto AND tienda=:tienda");
                                $actualizar->bindParam(":cantidad",$cantidad);
                                $actualizar->bindParam(":producto",$producto);
                                $actualizar->bindParam(":tienda",$tienda);
                                $actualizar->execute();
                                $actualizar = null;
                            }catch(PDOException $ex){
                                print 'ERROR al actualizar la tabla stock: ' . $ex->getMessage();
                                exit();
                            }
                        }else{
                            try{

                                //Si no existe, INSERT
                                $insertar = $dwes->prepare("INSERT INTO stock VALUES (:producto,:tienda,:unidades)");
                                $insertar->bindParam(":producto",$producto);
                                $insertar->bindParam(":tienda",$tienda);
                                $insertar->bindParam(":unidades",$cantidad);
                                $insertar->execute();
                                $insertar = null;
                            }catch(PDOException $ex){
                                print 'ERROR al insertar en la tabla stock: ' . $ex->getMessage();
                                exit();
                            }
                        }

                        $consulta = null;
                        $tienda = null;
                        $producto = null;
                        $cantidad = null;
                        $resultado = null;
                    }catch(PDOException $ex){
                        print 'ERROR al consultar las unidades: ' . $ex->getMessage();
                        exit();
                    }
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
                    try{
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
                    }catch(PDOException $ex){
                        print 'ERROR al consultar la tabla stock: ' . $ex->getMessage();
                        exit();
                    }

			?>
            </table>
    </div>

    <div id="contenido">
        <h2>Contenido</h2>
        <form action="#" method="post">
            <select name="tienda">
                <?php
                    try{
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
                    }catch(PDOException $ex){
                        print 'ERROR al consultar las tiendas: ' . $ex->getMessage();
                        exit();
                    }
                ?>
            </select>
            <select name="producto">
                <?php
                    try{
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
                    }catch(PDOException $ex){
                        print 'ERROR al consultar los productos: ' . $ex->getMessage();
                        exit();
                    }
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