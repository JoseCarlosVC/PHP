<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = $_POST['numero'];
        if(isset($numero)){
            if(feliz($numero)){
                echo "El número $numero es feliz";
            }else{
                echo "El número $numero NO es feliz";
            }
        }else{
    ?>
    <form action="#" method="POST">
        <label>Introduce un número</label>
        <input type="text" name="numero" pattern="(?=.*[0-9])[0-9]*"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        }
        function feliz($numero){
            if($numero == "1"){
                return true;
            }else{
                $feliz = 0;
                for($i=0; $i<strlen($numero); $i++){
                    $feliz += pow($numero[$i],2);
                }
                //El bucle se repetirá hasta que lleguemos al número original
                while($feliz != $numero){
                    $texto = (string) $feliz;
                    $feliz = 0;
                    for($i=0;  $i<strlen($texto); $i++){
                        $feliz += pow($texto[$i],2);
                    }
                    //Si en algún momento llegamos a 1, el número es feliz
                    if($feliz == 1){
                        return true;
                    }
                }
                //Si se sale del bucle, el número no es feliz
                return false;
            }
        }
    ?>
</body>
</html>