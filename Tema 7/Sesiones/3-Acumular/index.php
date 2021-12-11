<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once './sesion.php';
    const CUENTA = array('usuario' => "jose", 'password' => "aa");
    session_start();
?>
<!DOCTYPE html>
<html lang="es-es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        /**
         * Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
         *  su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
         * el contador de los números introducidos y la media. Utiliza sesiones.
         */
        if(isset($_POST['login'])){
            if(isset($_POST['usuario']) && isset($_POST['pass'])){
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];
                if((CUENTA['usuario'] == $usuario) && (CUENTA['password'] == $pass)){
                    echo "Datos correctos! </br>";
                    echo "Iniciando sesión... </br>";
                    ControlSesion::inicioSesion();
                    //Iniciamos la variable que parará el programa
                    $limite = false;
                }
            }
        }
        if(isset($_POST['logout'])){
            echo "Cerrando sesión... </br>";
            echo "Sesion cerrada! </br></br>";
            ControlSesion::cerrarSesion();
        }
        if(isset($_POST['enviar'])){
            $limite = $_POST['limite'];
            $total = ControlSesion::getSesion('total');
            if(!$limite){
                $numero = $_POST['numero'];
                ControlSesion::contadorPlus();
                ControlSesion::sumaMedia($numero);
                $total = ControlSesion::getSesion('total');
                //Si después de sumar los números se supera 10000, se detendrá el programa en la siguiente ejecución
                if($total >= 10000){
                    $limite = true;
                }
            }else{
                //Recogemos los datos para mostrarlos
                $total = ControlSesion::getSesion('total');
                $contador = ControlSesion::getSesion('contador');
                $media = $total / $contador;
                echo "<p>Se han introducido $contador números</p>";
                echo "<p>La suma total es $total</p>";
                echo "<p>La media es de $media</p>";
                //Cerramos sesion
                ControlSesion::cerrarSesion();
            }
        }
    ?>
    <form action="#" method="POST">
        <?php
            //Si no se ha iniciado sesión, mostramos el formulario de inicio de sesión
            if(!ControlSesion::isSesionIni()){
        ?>
            <label for="usuario">Introduce el nombre de usuario: </label>
            <input type="text" name="usuario"
                <?php
                    if(isset($_POST['login']) && isset($_POST['usuario']) && !empty($_POST['usuario'])){
                        echo 'value="'.$_POST['usuario'].'"';
                    }
                ?>
            autofocus>
            <br>
            <label for="pass">Introduce la contraseña: </label>
            <input type="password" name="pass">
            <br>
            <input type="submit" name="login" value="Iniciar sesión">
        <?php
            }else{
                //Cuando se inicie sesión, se mostrará el formulario del programa
        ?>
            <input type="hidden" name="limite" value="<?php echo $limite; ?>">
            <label for="numero">Introduce un número: </label>
            <input type="number" name="numero" autofocus>
            <br>
            <input type="submit" name="enviar" value="Enviar número">
            <br>
            <input type="submit" name="logout" value="Cerrar sesión">
        <?php
            }
        ?>
    </form>
</body>
</html>