<?php

class AuthHelper {

     static public function userLogged() {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])) {
            $tipo = $_SESSION['TIPO'];
            return $tipo;
        }
        return false;
         
    }

    static public function checkLogged() {      //Barrera de acceso para usuarios logueados
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . "login");die;
            
        } else {
            return true;
        }

    }

    static public function userName() {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['USERNAME'])) {
            return $_SESSION['USERNAME'];
        }
        
         
    }

   
    
}