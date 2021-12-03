<?php

class ControlSesion {
    public static function inicioSesion($usuario, $total, $contador){
        if(session_id() == ''){
            session_start();
        }
        $_SESSION['usuario'] = $usuario;
        $_SESSION['total'] = $total;
        $_SESSION['contador'] = $contador;
    }

    public static function closeSesion(){
        if(session_id() == ''){
            session_start();
        }

        if(isset($_SESSION['usuario'])){
            unset($_SESSION['usuario']);
        }

        if(isset($_SESSION['total'])){
            unset($_SESSION['total']);
        }

        if(isset($_SESSION['contador'])){
            unset($_SESSION['contador']);
        }

        session_destroy();
    }

    public static function isSesionInic(){
        if(session_id() == ''){
            session_start();
        }

        if(isset($_SESSION['usuario']) && isset($_SESSION['total']) && isset($_SESSION['contador'])){
            return true;
        }else{
            return false;
        }
    }
}
?>