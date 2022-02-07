<?php

class Conexion
{
    private static $conexion;

    public static function openConexion()
    {
        if (!isset(self::$conexion)) {
            try {
                include_once 'config.inc.php';

                self::$conexion = new mysqli(NOMBRE_SERVIDOR, NOMBRE_USUARIO, PASSWORD, NOMBRE_BD);

                return static::$conexion;
            } catch (mysqli_sql_exception $err) {
                echo "Error en la conexión a la base de datos " . $err->getMessage();
                exit();
            }
        }
    }

    public static function closeConexion()
    {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }
    public static function extractConexion()
    {
        return self::$conexion;
    }
}
