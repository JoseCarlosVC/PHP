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
        $numeros = $_POST['numeros'];
        $arr_num = [0,1,2,3,4,5,6,7,8];
        if(isset($numeros)){
            foreach($numeros as $n){
                echo $n." ";
            }
        }else{
    ?>
    <form action="#" method="POST">
        <input type="hidden" name="numeros" value="<?php echo $arr_num; ?>">
        <input type="submit" value="Enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>