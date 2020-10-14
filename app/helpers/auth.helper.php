<?php
    class AuthHelper{
        function __construct(){}

         //barrera de seguridad
        function checkLogueado(){
            session_start();
            if(!isset($_SESSION['ID_USER'])){ //Si no esta logueado
                header("Location: " .BASE_URL. "login");
                die(); 
            } 
        }

        function isLogueado(){
            session_start();
            if(!isset($_SESSION['ID_USER'])){ //Si no esta logueado
               return false;
            }
            else{
                return true;
            }
        }

        function logout(){
            session_start();
            session_destroy();
            header("Location: ". BASE_URL . "login");
        }

        function login($usuario){
            session_start();
            $_SESSION['ID_USER'] = $usuario->id;
            $_SESSION['EMAIL_USER'] = $usuario->mail; 
        }
    }