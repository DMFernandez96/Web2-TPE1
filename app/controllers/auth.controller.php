<?php
    include_once 'app/models/user.model.php';
    include_once 'app/views/auth.view.php';
    include_once 'app/helpers/auth.helper.php';

    class AuthController{

        private $model;
        private $view;
        private $authHelper;

        function __construct(){
            $this->model = new UserModel();
            $this->view = new AuthView();
            $this->authHelper = new AuthHelper();
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
 
           //hashing.
            if($usuario && password_verify($password, $usuario->password)){ //las vuelvo a encriptar para comparar
                //armo la session del usuario
                $this->authHelper->login($usuario); 

                header("Location: ". BASE_URL . "adminRecetas");
            } else{
                $this->view->showFormLogin("Credenciales invalidas");  
            }
        } 

        function logout(){
            $this->authHelper->logout();
        }
    }