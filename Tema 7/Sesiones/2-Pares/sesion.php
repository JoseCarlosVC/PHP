<?php
    class controlSesion{
        public static function inicioSesion($usuario, $contador, $contimp, $mediaimp, $maypar){
            if(session_id() == ''){
                session_start();
                //Iniciamos los valores
            }
            $_SESSION['usuario'] = $usuario;
            $_SESSION['contador'] = $contador;
            $_SESSION['contimp'] = $contimp;
            $_SESSION['mediaimp'] = $mediaimp;
            $_SESSION['maypar'] = $maypar;
        }

        public static function sumarSesion($nombre){
            $_SESSION[$nombre]++;
        }

        public static function getSesion($nombre){
            return $_SESSION[$nombre];
        }

        public static function sumarMedia($numero){
            $_SESSION['mediaimp'] += $numero;
        }

        public static function setMayor($numero){
            //Si la variable de sesión no es un número (valor por defecto) o es menor que el número que recibe, se cambia
            if(!is_int($_SESSION['maypar']) || $_SESSION['maypar'] < $numero)
                $_SESSION['maypar'] = $numero;
            }
        public static function cerrarSesion(){
            if(session_id() == ''){
                session_start();
            }

            if(isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }

            if(isset($_SESSION['contador'])){
                unset($_SESSION['contador']);
            }

            if(isset($_SESSION['contimp'])){
                unset($_SESSION['contimp']);
            }

            if(isset($_SESSION['mediaimp'])){
                unset($_SESSION['mediaimp']);
            }

            if(isset($_SESSION['maypar'])){
                unset($_SESSION['maypar']);
            }

            session_destroy();
        }

        public static function isSesionIni(){
            if(session_id() == ''){
                session_start();
            }

            if(isset($_SESSION['usuario']) && isset($_SESSION['contador']) && isset($_SESSION['contimp']) && isset($_SESSION['mediaimp']) && isset($_SESSION['maypar'])){
                return true;
            }else{
                return false;
            }
        }
    }
?>