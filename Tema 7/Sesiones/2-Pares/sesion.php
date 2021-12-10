<?php
    class controlSesion{
        public static function inicioSesion($usuario, $numero, $contador, $contimp, $mediaimp, $maypar){
            if(session_id() == ''){
                session_start();
                //Iniciamos los valores
                $_SESSION['contador'] = 0;
                $_SESSION['contimp'] = 0;
                $_SESSION['mediaimp'] = 0;
                $_SESSION['maypar'] = 0;
            }
            $_SESSION['usuario'] = $usuario;
            $_SESSION['numero'] = $numero;
            $_SESSION['contador'] += $contador;
            $_SESSION['contimp'] += $contimp;
            $_SESSION['mediaimp'] += $mediaimp;
            if($_SESSION['maypar'] < $maypar){
                $_SESSION['maypar'] = $maypar;
            }
        }
        public static function cerrarSesion(){
            if(session_id() == ''){
                session_start();
            }

            if(isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }

            if(isset($_SESSION['numero'])){
                unset($_SESSION['numero']);
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

            if(isset($_SESSION['usuario']) && isset($_SESSION['numero']) && isset($_SESSION['contador']) && isset($_SESSION['contimp']) && isset($_SESSION['mediaimp']) && isset($_SESSION['maypar'])){
                return true;
            }else{
                return false;
            }
        }
    }
?>