<?php
    function vaciarResultado($acierto){
        //Creamos una cadena de texto de la misma longitud que la palabra a adivinar y la rellenamos con guiones
        $mostrar = "";
        for($i = 0; $i < strlen($acierto); $i++){
            $mostrar.="_";
        }
        return $mostrar;
    }
?>