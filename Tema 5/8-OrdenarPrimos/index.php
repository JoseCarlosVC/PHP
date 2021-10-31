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
        $numero = $_POST['numero'];
        $contador = $_POST['contador'];
        $texto = $_POST['texto'];

        if(!isset($numero)){
            $contador = 0;
            $texto = "";
        }
        if($contador == 10){
            $texto = $texto.",".$numero;
            $texto = substr($texto,2);
            $arr_num = explode(",",$texto);
            //Mostramos los numeros...
            echo "<table>";
            
            for($i=0; $i<10; $i++){
                echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$arr_num[$i]."</td>";
                echo "</tr>";
            }
            echo "</table><br>";

            //Podemos hacer lo mismo que en el ejercicio anterior; declarar un array de tamaño fijo y añadir los primos al principio y el resto al final
            $primos = new SplFixedArray(10);
            $principio = 0;
            $final = 9;
            $divisible = 0;
            for($j=0;$j<10;$j++){
                //Calculamos si es primo...
                for($k=1;$k<=$arr_num[$j];$k++){
                    if($arr_num[$j]%$k==0){
                        $divisible++;
                    }
                }
                //Si es primo va al principio, si no, al final
                if($divisible == 2){
                    $primos[$principio] = $arr_num[$j];
                    $principio++;
                }else{
                    $primos[$final] = $arr_num[$j];
                    $final--;
                }
                //Reiniciamos la variable
                $divisible = 0;
            }

            echo "<table>";
            for($l=0; $l<10; $l++){
                echo "<tr>";
                    echo "<td>".$l."</td>";
                    echo "<td>".$primos[$l]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
    ?>
    <form action="#" method="post">
        <label>Introduzca un número</label>
        <input type="number" name="numero" autofocus required>
        <input type="hidden" name="contador" value="<?php echo ++$contador ?>">
        <input type="hidden" name="texto" value="<?php echo ($texto.",".$numero) ?>">
        <input type="submit" value="OK">
    </form>
    <?php
        }
    ?>
</body>
</html>