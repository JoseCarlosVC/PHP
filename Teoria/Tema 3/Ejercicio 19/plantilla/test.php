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
        $dwes = new mysqli('localhost','jose','aa','dwes');
        $error = $dwes->connect_errno;
        if($error != null){
            echo "error";
            exit();
        }else{
            echo "exito";
        }
        $dwes->close();
    ?>
</body>
</html>