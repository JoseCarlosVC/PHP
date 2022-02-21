<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['apellido1']) && isset($_POST['fechaNac'])){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $apellido1 = $_POST['apellido1'];
            $fechaNac = $_POST['fechaNac'];
        }
    }