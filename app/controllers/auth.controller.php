<?php
    include_once 'app/models/user.model.php';
    include_once 'app/views/auth.view.php';

    class AuthController{

        private $model;
        private $view;

        function __construct(){
            $this->model = new UserModel();
            $this->view = new AuthView();

        }

        function showLogin(){
            $this->view->showFormLogin();
        }

         function verifyUser(){
            $mail= $_POST['mail'];
            $password= $_POST['password'];

            if(empty($mail) || empty($password)){
                $this->view->showFormLogin("Faltan datos obligatorios");
                die();
            }

            //obtengo usuario
            $usuario = $this->model->getPorMail($mail);

           //su user existe, y las password coinciden 
           //hashing.
            if($usuario && password_verify($password, $usuario->password)){ //con esto las vuelvo a encriptar para comparar

                //armo la session del usuario
                //inicio sesion. Esto mismo lo uso para berificar q el usuario este logueado mas adelante. En los request
                session_start();
                $_SESSION['ID_USER'] = $usuario->id;
                $_SESSION['EMAIL_USER'] = $usuario->mail; 

                header("Location: ". BASE_URL . "admin");
            } else{
                $this->view->showFormLogin("Credenciales invalidas");
                
            }

        } 

    }