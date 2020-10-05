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
               /*  $this->view->printError("Faltan datos obligatorios"); */
               echo "faltan datos";
                die();
            }

            //obtengo usuario
            $usuario = $this->model->getPorMail($mail);

           //su user existe, y las password cohinciden 
            if($usuario && password_verify($password, $usuario->password)){ // md5($password) con esto las vuelvo a encriptar para comparar
                echo "acceso exitoso";

            } else{
                echo "acceso denegado";
            }

        }

    }