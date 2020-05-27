<?php

class AuthHelper {

    

    static public function userLogged() {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])) {
            return true;
        }
        return false;
         
    }

    static public function checkLogged() {
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