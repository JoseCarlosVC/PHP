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
        $arr_num = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14];
        for($i = (count($arr_num)-1); $i >= 0; $i-- ){
            if($i == 0){
            
            }
            $aux = $arr_num[$i];
            $arr_num[$i] = $arr_num[$i-1];
        }
        foreach($arr_num as $n){
            echo $n."<br>";
        }
    ?>
</body>
</html>