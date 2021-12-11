<?php
    $login = false;
    const CUENTA = array('usuario' => 'jose', 'password' => 'aa');
    if(isset($_POST['enviar'])){
            $login = true;
            $contador = $_COOKIE['contador'];
            $total = $_COOKIE['total'];
        if($_POST['numero']>=0){
            $numero = $_POST['numero'];
            $contador++;
            $total += $numero;
            setcookie('contador',$contador, time() + 24*60*60);
            setcookie('total',$total, time() + 24*60*60);
        }else{
            $media = $total/ $contador;
            
            setcookie('contador',NULL,-1);
            setcookie('total',NULL,-1);
        }
    }else{
        //Iniciamos las cookies
        setcookie('contador',NULL, time() + 24*60*60);
        setcookie('total',NULL, time() + 24*60*60);
    }

    if(isset($_POST['borrar'])){
        setcookie('contador',NULL,-1);
        setcookie('total',NULL,-1);
    }

    if(isset($_POST['login'])){
        if(isset($_POST['usuario']) && isset($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];
            if((CUENTA['usuario'] == $usuario) && (CUENTA['password'] == $pass)){
                setcookie('contador',0, time() + 24*60*60);
                setcookie('total',0, time() + 24*60*60);
                $login = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./../../ejercicios.css">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
     * teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
     * terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.
    */
    if(isset($media)){
        echo "<p>La media de los números introducidos es $media</p>";
    }
    ?>
    <form action="#" method="post">
        <?php
            if(!$login){
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
        <input type="submit" value="Iniciar sesión" name="login">
        <?php
            }else{
        ?>        
            <label for="numero">Introduce un número: </label>
            <input type="number" name="numero" required autofocus>
            <br>
            <input type="submit" value="Enviar número" name="enviar">
            <input type="submit" value="Borrar cookies" name="borrar">
        <?php
            }
        ?>
    </form>
</body>
</html>