<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../ejercicios.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        //Recogemos las palabras que se han seleccionado en el if
        $palabras = [$_POST['palabra1'],$_POST['palabra2'],$_POST['palabra3'],$_POST['palabra4'],$_POST['palabra5']];
        $respuestas = [$_POST['respuesta1'],$_POST['respuesta2'],$_POST['respuesta3'],$_POST['respuesta4'],$_POST['respuesta5']];
        //Necesitamos que el diccionario este siempre declarado
        $diccionario = array("el" => "the", "ser" => "be", "to" => "para", "de" => "of", "y" => "and", "un" => "a", "dentro" => "in", "aquello" => "that", "tener" => "have", "yo" => "i", "ello" => "it", "para" => "for", "no" => "not", "sobre" => "on", "con" => "with", "como" => "as", "tu" => "you", "hacer" => "do", "mientras" => "while");
        //El array siempre estará declarado, necesitamos comprobar uno de sus valores
        if(!isset($respuestas[0])){        
            $contador = 0;
            //Para usar números aleatorios, necesitamos un array con indices numericos
            //Usando el bucle foreach podemos distinguir entre los valores clave y los valores referenciados
            foreach($diccionario as $palabra => $traduccion){
                //Seleccionamos las palabras en español y las pasamos a un array con índices numericos
                $aleatorio[$contador] = $palabra;
                $contador ++;
            }
            //Sacamos 5 palabras...
            $palabra1 = $aleatorio[rand(0,(count($aleatorio)-1))];
            $palabra2 = $aleatorio[rand(0,(count($aleatorio)-1))];
            $palabra3 = $aleatorio[rand(0,(count($aleatorio)-1))];
            $palabra4 = $aleatorio[rand(0,(count($aleatorio)-1))];
            $palabra5 = $aleatorio[rand(0,(count($aleatorio)-1))];
    
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="palabra1" value="<?php echo $palabra1; ?>">
        <label><?php echo $palabra1; ?></label>
        <input type="text" name="respuesta1"><br>

        <input type="hidden" name="palabra2" value="<?php echo $palabra2; ?>">
        <label><?php echo $palabra2; ?></label>
        <input type="text" name="respuesta2"><br>

        <input type="hidden" name="palabra3" value="<?php echo $palabra3; ?>">
        <label><?php echo $palabra3; ?></label>
        <input type="text" name="respuesta3"><br>

        <input type="hidden" name="palabra4" value="<?php echo $palabra4; ?>">
        <label><?php echo $palabra4; ?></label>
        <input type="text" name="respuesta4"><br>

        <input type="hidden" name="palabra5" value="<?php echo $palabra5; ?>">
        <label><?php echo $palabra5; ?></label>
        <input type="text" name="respuesta5"><br>

        <input type="submit" value="enviar">
    </form>
    <?php
        }else{
            
            $acierto = 0;
            $fallo = 0;
            for($i=0; $i<count($respuestas); $i++){
                //Todas las palabras del array estan en minuscula, necesitamos lo mismo
                //Las comprobamos con las del array asociativo del diccionario, usando como indices las palabras mostradas por el formulario
                if(strtolower($respuestas[$i]) == $diccionario[$palabras[$i]]){
                    echo "<p>".$respuestas[$i]." correcta</p>";
                    $acierto++;
                }else{
                    echo "<p>".$respuestas[$i]." incorrecta</p>";
                    $fallo++;
                }
            }
            echo "<p>Aciertos: ".$acierto."</p>";
            echo "<p>Fallos: ".$fallo."</p>";
        }
    ?>
</body>
</html>