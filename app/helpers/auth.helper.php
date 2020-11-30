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
            $_SESSION['ADMIN_USER'] =$usuario->administrador;
           /*  header("Location: ". BASE_URL . "home"); */
        }

        /*  function isAdmin(){ 
             if($_SESSION['ADMIN_USER'] == 1){ //Si es admin
               return true;
            }
            else{
                return false;
            }
        }  */

        function isAdmin(){
            if(!isset($_SESSION['ADMIN_USER'])){ //Si no esta logueado
               return false;
            }
            else if($_SESSION['ADMIN_USER'] == 1){ //es admin
                return true;
            }
            else{ //no es admin
                return false;
            }
        }

        function checkIsAdmin(){
            if($_SESSION['ADMIN_USER'] == 0){ //Si no es admin
                header("Location: " .BASE_URL. "home");
                die(); 
            } 
        }
  
    }