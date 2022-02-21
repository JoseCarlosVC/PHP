<?php
    if(isset($_POST['submit'])){
        //TODO meter la foto
        if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['apellido1']) && isset($_POST['fechaNac']) && isset($_POST['passwd'])){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $apellido1 = $_POST['apellido1'];
            $fechaNac = $_POST['fechaNac'];
            $passwd = $_POST['passwd'];

            require_once("./app/conexion.inc.php");
            $conexion = Conexion::openConexion();

            $existe = $conexion->query("SELECT * FROM usuario WHERE correo=$correo");
            if($registro = $existe->fetch()){
                echo "Este correo ya existe en la base de datos";
            }else{
                
            }
        }
    }
