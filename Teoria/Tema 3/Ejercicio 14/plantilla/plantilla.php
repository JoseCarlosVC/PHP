<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!--
    Ejercicio 14: De una forma similar al anterior ejercicio de
    transacciones, utiliza PDO para repartir entre las tiendas las
    tres unidades que figuran en stock del producto con código
    PAPYRE62GB.

    En esta ocasión, para comprobar si los cambios se hacen
    correctamente en la base de datos y confirmamos la
    transacción, se revisa el número de registros afectados por la
    ejecución de las consultas.

    Revisa el código de la página y comprueba que la segunda
    vez que intentas ejecutarlo no actualizará los datos, tal y
    como sucedía en el ejercicio equivalente de la extensión
    MySQLi.
-->

<body>
    <?php
        $dwes = new PDO('mysql:host=localhost;dbname=dwes','jose','aa');
?>

    <div id="encabezado">
        <h1>Ejercicio: </h1>
    </div>
    <div id="contenido">
        <h2>Contenido</h2>
        <?php
            $ok = true;
            $dwes->beginTransaction();

            //Si en algún caso no hay columnas afectadas, es porque ya se ha realizado esta operación
            if($dwes->exec("UPDATE stock SET unidades=1 WHERE producto='PAPYRE62GB' AND tienda=1 AND unidades=2")==0){
                $ok = false;
            }else if($dwes->exec("INSERT INTO stock VALUES('PAPYRE62GB',2,1)")==0){
                $ok = false;
            }
            //En caso de que no se hayan ejecutado nunca, se harán
            if($ok){
                $dwes->commit();
                echo "<p>Se ha actualizado la tabla stock correctamente</p>";
            }else{
                $dwes->rollBack();
                echo "<p>La tabla stock ya tenía estos cambios</p>";
            }
        ?>
    </div>
    <div id="pie">
    </div>
    <?php
        //Para cerrar la conexión con PDO, solo hace falta vaciar la variable que la contiene
        $dwes = null;
    ?>
</body>

</html>