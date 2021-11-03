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
        $diccionario = array("el" => "the", "ser" => "be", "to" => "para", "de" => "of", "y" => "and", "un" => "a", "dentro" => "in", "aquello" => "that", "tener" => "have", "yo" => "I", "ello" => "it", "para" => "for", "no" => "not", "sobre" => "on", "con" => "with", "como" => "as", "tu" => "you", "hacer" => "do", "mientras" => "while");
        $palabra = $_POST['palabra'];
        if(isset($palabra)){
            //Todas las palabras del array estan en minúscula, necesitamos que la palabra introducida tambien lo este
            $palabra = strtolower($palabra);
            echo "<p>La traducción de ".$palabra." es ".$diccionario[$palabra]."</p>";
        }else{
    ?>
    <form action="#" method="post">
        <label>Introduce una palabra en español</label>
        <input type="text" name="palabra"><br>
        <input type="submit" value="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>