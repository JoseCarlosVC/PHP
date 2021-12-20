<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
  <?php
    require_once("./Empleado.php");
    require_once ("./Factura.php");
    $fac = new Factura(34,"30/12/12",1.1,30,true);
    $fac->imprimir();
  ?>
</body>
</html>