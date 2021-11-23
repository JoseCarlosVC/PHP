<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        if(!empty($_POST['agenda'])){
            $agenda = $_POST['agenda'];
            if(in_array($_POST['nombre'], $agenda) && isset($_POST['tlf'])){
                actualizarAgenda($agenda, $_POST['nombre'], $_POST['tlf']);
            }else if(in_array($_POST['nombre'], $agenda) && !(isset($_POST['tlf']))){
                eliminarAgenda($agenda, $nombre);
            }else{
                $agenda[$_POST['nombre']] = $_POST['tlf'];
            }
            mostrarAgenda($agenda);
        }else if(!empty($_POST['nombre'])){
            //Aqui va el primer valor, no es necesario hacer ninguna comprobación en el primer valor
            $agenda = array($_POST['nombre'] => $_POST['tlf']);
            mostrarAgenda($agenda);
        }else{
            $agenda = array();
        }
    ?>
    <form action="#" method="POST">
        <?php
        if(!empty($agenda)){
            foreach($agenda as $clave => $valor){
                echo "<input type='hidden' name='agenda[$clave]' value='$valor'>";
            }
        } 
        ?>
        <label>Introduce un nombre: </label>
        <input type="text" name="nombre" required autofocus><br>
        <label>Introduce el número de teléfono: </label>
        <input type="number" name="tlf"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        function mostrarAgenda($agenda){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Nombre: </th>";
                    echo "<th>Teléfono: </th>";
                echo "</tr>";
                foreach($agenda as $clave => $valor){
                    echo "<tr>";
                        echo "<td>$clave</td>";
                        echo "<td>$valor</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
        function actualizarAgenda($agenda, $nombre ,$numero){
            $agenda[$nombre] = $numero;
        }
        function eliminarAgenda($agenda, $nombre){
            unset($agenda[$nombre]);
        }
    ?>
</body>
</html>
