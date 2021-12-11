<?php
    class ControlSesion{
        public static function inicioSesion(){
            if(session_id() == ''){
                session_start();
            }
            //Iniciamos los valores de la sesión a 0 para su uso posterior
            $_SESSION['total'] = 0;
            $_SESSION['contador'] = 0;
        }

        public static function contadorPlus(){
            $_SESSION['contador']++;
        }

        public static function sumaMedia($numero){
            $_SESSION['total'] += $numero;
            var_dump($_SESSION['total']);
        }

        public static function getSesion($nombre){
            return $_SESSION[$nombre];
        }

        public static function cerrarSesion(){
            if(session_id() == ''){
                session_start();
            }

            if(isset($_SESSION['total'])){
                unset($_SESSION['total']);
            }
            if(isset($_SESSION['contador'])){
                unset($_SESSION['contador']);
            }
            session_destroy();
        }

        public static function isSesionIni(){
            if(isset($_SESSION['total']) && isset($_SESSION['contador'])){
                return true;
            }else{
                return false;
            }
        }
    }
?>