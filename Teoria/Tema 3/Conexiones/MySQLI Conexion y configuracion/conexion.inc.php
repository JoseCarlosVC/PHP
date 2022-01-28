<?php
    class Conexion {
        private static $conexion;

        public static function openConexion(){
            if(!isset(self::$conexion)){
                try{
                    include_once './config.inc.php';

                    self::$conexion = new mysqli(NOMBRE_SERVIDOR,NOMBRE_USUARIO,PASSWORD,NOMBRE_BD);
                }
            }
        }
    }