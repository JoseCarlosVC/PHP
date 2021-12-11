<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once './sesion.php';
    const CUENTA = array('usuario' => "jose", 'password' => "aa");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
     * Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
     * nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
     * número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
     * en el cómputo. Utiliza sesiones.
     */
        if(isset($_POST['login'])){
            if(isset($_POST['usuario']) && isset($_POST['pass'])){
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];
                if((CUENTA['usuario'] == $usuario) && (CUENTA['password'] == $pass)){
                    echo "Datos correctos! </br>";
                    echo "Iniciando sesión... </br>";
                    //Iniciamos sesión con valores por defecto
                    controlSesion::inicioSesion($usuario,0,0,0,0,"");
                }
            }
        }
        if(isset($_POST['logout'])){
            echo "Cerrando sesión... </br>";
            controlSesion::cerrarSesion();
            echo "Sesion cerrada! </br></br>";
        }
        if(isset($_POST['enviar'])){
            $numero = $_POST['numero'];
            
            if($numero >= 0){
                controlSesion::sumarSesion('contador');
                if($numero%2==0){
                    controlSesion::setMayor($numero);
                }else{
                    controlSesion::sumarSesion('contimp');
                    controlSesion::sumarMedia($numero);
                }
            }else{
                //Recogemos los datos para mostrarlos
                $contador = controlSesion::getSesion('contador');
                $contimp = controlSesion::getSesion('contimp');
                $mediaimp = controlSesion::getSesion('mediaimp');
                $maypar = controlSesion::getSesion('maypar');

                $mediaimp = $mediaimp / $contimp;
                echo "<p>Se han introducido $contador números</p>";
                echo "<p>La media de los impares es $mediaimp</p>";
                echo "<p>El número par mayor es $maypar</p>";

                //Cerramos sesion
                controlSesion::cerrarSesion();
            }
        }
    ?>
    <form action="#" method="post">
        <label for="usuario">Introduce el nombre de usuario: </label>
        <input type="text" name="usuario"
            <?php
                if(isset($_POST['login']) && isset($_POST['usuario']) && !empty($_POST['usuario'])){
                    echo 'value="'.$_POST['usuario'].'"';
                }
            ?>
        >
        <br>
        <label for="pass">Introduce la contraseña: </label>
        <input type="password" name="pass">
        <input type="submit" name="login" value="Iniciar sesión">
        <?php
            if(controlSesion::isSesionIni()){
                ?>
                <label for="numero">Introduce un número: </label>
                <input type="number" name="numero">
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