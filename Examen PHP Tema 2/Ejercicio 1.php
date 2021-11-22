<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td{
            border: 2px solid black;
        }
    </style>
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
            echo "Array introducido: <br>";
            mostrar($arr_num);
            echo "<br>";
            echo "Array modificado: <br>";
            $arr_num = moverPrimos($arr_num);
            mostrar($arr_num);
        }else{
    ?>
    <form action="#" method="POST">
        <label>Introduce un número</label>
        <input type="number" name="numero" required autofocus><br>
        <input type="hidden" name="contador" value="<?php echo ++$contador; ?>">
        <input type="hidden" name="texto" value="<?php echo $texto.",".$numero; ?>">
        <input type="submit" value="Enviar";
    </form>
    <?php
        }
        function mostrar($arr_num){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Clave</th>";
                    echo "<th>Valor</th>";
                echo "</tr>";
                foreach($arr_num as $clave => $valor){
                    echo "<tr>";
                        echo "<td>$clave</td>";
                        echo "<td>$valor</td>";
                    echo "</tr>";
                }
            echo "</table>";
        }
        //Aplicamos la misma lógica que en el ejercicio de la relación; con dos variables podemos poner los valores desde el principio y el final
        function moverPrimos($arr_num){
            $primos = new SplFixedArray(count($arr_num));
            $principio = 0;
            $fin = (count($arr_num)-1);
            $contador = 0;
            for($i = 0; $i<count($arr_num); $i++){
                for($j = 1; $j<= $arr_num[$i]; $j++){
                    if($arr_num[$i] % $j == 0){
                        $contador++;
                    }
                }
                if($contador == 2){
                    $primos[$fin] = $arr_num[$i];
                    $fin--;
                }else{
                    $primos[$principio] = $arr_num[$i];
                    $principio++;
                }
                $contador = 0;
            }
            return $primos;
        }
    ?>
</body>
</html>