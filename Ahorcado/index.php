<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./lib/funciones.inc.php");
        if(isset($win)){
            $win = $_POST['win'];
        }
        //Hay 7 intentos para adivinar la palabra, si se superan, termina el juego
        //Nada más empezar, pedimos una palabra para adivinar
        if(!isset($_POST['enviar'])){
            $intentos = 0;
            $win = false;
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="win" value="<?php echo $win; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <label for="acierto">Introduce una palabra: </label>
        <input type="text" name="acierto" pattern="(?=.*([A-Z]||[a-z])).*" autofocus required><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
        }else if(isset($_POST['enviar']) && ($intentos < 6)){
            $acierto = strtolower($_POST['acierto']);
            $intentos = $_POST['intentos'];
            //Usaremos la variable mostrar para enseñar los caracteres que vayamos acertando
            $mostrar = vaciarResultado($acierto);
            //Cuando se empiecen a introducir caracteres, empezamos el juego
            if(isset($_POST['palabra'])){
                $palabra = strtolower($_POST['palabra']);
                $mostrar = $_POST['mostrar'];
                //Si se ha introducido un caracter, comprobamos si está en la palabra o no
                //Por otra parte, si se ha introducido más de un caracter lo comparamos con la palabra para ver si se ha acertado o si se termina el juego
                
                if(strlen($palabra) == 1){
                    //Necesitamos una comparación estricta, ya que si strpos devuelve 0 si se encuentra en la primera posicion (0 se interpretará como false en una comparación normal )
                    if(strpos($acierto, $palabra) !== false){
                        $mostrar = incluyeLetra($acierto,$palabra,$mostrar);
                        if($mostrar == $acierto){
                            echo "<p>Has acertado!</p>";
                            $win = true;
                        }
                    }else{
                        //Si se encuentra la letra en la palabra, la mostramos, si no, se incrementa el número de fallos
                        $intentos ++;
                        if($intentos == 6){
                            echo "<p>Has fallado, fin del juego</p>";
                            $win = true;
                        }
                    }
                }else{
                    if($palabra == $acierto){
                        echo "<p>Has acertado!</p>";
                        $win = true;
                    }else{
                        $intentos = 6; //Mostramos la última imagen
                        echo "<p>Has fallado, fin del juego</p>";
                        $win = true;
                    }
                }
            }
            //Mientras siga el juego, mostramos el formulario
        if($win == false){
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="win" value="<?php echo $win; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <input type="hidden" name="mostrar" value="<?php echo $mostrar; ?>">
        <input type="hidden" name="acierto" value="<?php echo $acierto; ?>">
        <label for="palabra">Introduce una letra o adivina la palabra</label>
        <input type="text" name="palabra" pattern="(?=.*[A-Z]||[a-z]).*" autofocus required><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
        }
        }
        //Las imágenes están numeradas, se irá mostrando una distinta cada vez que haya un fallo
        echo "<img src='./img/Hangman-$intentos.png'>";
        echo "<br>";
        if(isset($mostrar)){
            echo "<p>";
            for($i = 0; $i < strlen($mostrar); $i++){
                echo $mostrar[$i]." ";
            }
            echo "</p>";
        }
        if($intentos == 6){
            echo "<p>Fin del juego</p>";
        }
    ?>
</body>
</html>