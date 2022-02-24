<?php
if (isset($_GET['enviar'])) {
    require_once '../app/conexion.inc.php';
    $conexion = Conexion::openConexion();
    $id = $_GET['id'];

    try {
        $consulta = $conexion->query("SELECT imagen FROM producto WHERE cod=$id");
        if ($consulta->num_rows > 0) {
            $imgData = $consulta->fetch_assoc();
?>
<div class="galeria">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($imgData['imagen']); ?>" alt="" srcset="">
</div>
<?php
        } else {
            echo "no";
        }
    } catch (mysqli_sql_exception $err) {
        echo "ERROR: " . $err->getMessage();
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="GET">
        <label for="id">ID de la imagen: </label>
        <input type="number" name="id">
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>

</html>