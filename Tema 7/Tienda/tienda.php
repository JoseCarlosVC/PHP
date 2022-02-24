<?php
if (isset($_GET['cod'])) {
    if (isset($_COOKIE['carrito'])) {
        $array = unserialize($_COOKIE['carrito']);
        $cod = $_GET['cod'];

        if (array_key_exists($cod, $array)) {
            $array[$cod]++;
        } else {
            $array[$cod] = 1;
        }

        $valor = serialize($array);
        setcookie("carrito", $valor, time() + 60 * 60 * 24);
    } else {
        $cod = $_GET['cod'];
        $unidades = 1;
        $producto = array("$cod" => $unidades);
        $valor = serialize($producto);
        setcookie("carrito", $valor, time() + 60 * 60 * 24);
    }

    header("Location: ./tienda.php");
} else if (isset($_GET['borrar'])) {
    $array = unserialize($_COOKIE['carrito']);
    $cod = $_GET['borrar'];
    unset($array[$cod]);
    $valor = serialize($array);
    setcookie("carrito", $valor, time() + 60 * 60 * 24);
    header("Location: ./tienda.php");
}

//header("Location: ./tienda");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/actualizar.css">
    <title>Armaritos</title>
</head>

<body>
    <main>
        <div class="seccion">
            <h2>Catálogo</h2>
            <?php ini_set('display_errors', 1);
            error_reporting(E_ALL);
            require_once("./app/conexion.inc.php");
            $conexion = Conexion::openConexion();
            try {
                $catalogo = $conexion->query("SELECT cod,nombre,precio,imagen FROM producto");
                $stock = $catalogo->fetch_assoc();
                while ($stock != null) {
            ?>
            <div class="articulo">
                <div class="imagen">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($stock['imagen']); ?>" alt=""
                        srcset="" width="250px" height="250px">
                </div>
                <p class="nombre"><?php echo $stock['nombre']; ?></p>
                <p class="precio"><?php echo $stock['precio']; ?> €</p>
                <a href="./detalles.php?cod=<?php echo $stock['cod']; ?>" class="detalles">Detalles</a>
                <a href="./tienda.php?cod=<?php echo $stock['cod']; ?>" class="comprar">Comprar</a>
            </div>
            <?php
                    $stock = $catalogo->fetch_assoc();
                }
            } catch (mysqli_sql_exception $err) {
                echo "ERROR: " . $err->getMessage();
                exit();
            }

            ?>
        </div>
        <div class="seccion">
            <h2>Carrito</h2>
            <?php if (isset($_COOKIE['carrito'])) {
                $carro = unserialize($_COOKIE['carrito']);
                foreach ($carro as $codigo => $unidad) {
                    $articulo = $conexion->query("SELECT nombre,precio,imagen FROM producto WHERE cod=$codigo");
                    $item = $articulo->fetch_assoc();
            ?>
            <div class="carrito">
                <div class="imagen">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['imagen']); ?>" alt=""
                        srcset="" width="150px" height="150px">
                </div>
                <p class="nombre"><?php echo $item['nombre']; ?></p>
                <p class="precio"><?php echo $item['precio']; ?> €</p>
                <p class="unidades"><?php echo $unidad; ?> Uds.</p>
                <a href="./tienda.php?borrar=<?php echo $codigo ?>" class="detalles">Eliminar</a>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </main>
    <?php
    $conexion = Conexion::closeConexion();
    ?>
</body>

</html>