<?php
    include_once 'app/models/user.model.php';
    include_once 'app/views/auth.view.php';
    include_once 'app/helpers/auth.helper.php';

    class AuthController{

        private $model;
        private $view;
        private $recetaView;
        private $authHelper;

        function __construct(){
            $this->model = new UserModel();
            $this->view = new AuthView();
            $this->recetaView = new RecetaView();
            $this->authHelper = new AuthHelper();
        }
/* *****************************************  PUBLICO  ************************************************************** */

/* *******************  LOGIN  ******************** */
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
            if($usuario && password_verify($password, $usuario->pass)){ //las vuelvo a encriptar para comparar
                //armo la session del usuario
                $this->authHelper->login($usuario); 
                if($this->authHelper->isAdmin() ){
                    header("Location: ". BASE_URL . "adminRecetas");
                }
                else{ 
                    header("Location: ". BASE_URL . "home");
                }
            } else{
                $this->view->showFormLogin("Credenciales invalidas");  
            }
        } 
/* ********************    LOGOUT    ***************************** */
        function logout(){
            $this->authHelper->logout();
        }

/* ***********************     REGISTRARSE    *********************** */
        function showSignUp(){
            $this->view->showFormRegistro();
        }

        function addUsuario(){
            $mail= $_POST['mail'];
            $password= $_POST['password'];

            $admin =$this->authHelper->isAdmin();

            if(empty($mail) || empty($password)){
                $this->view->showFormRegistro("Faltan datos obligatorios");
                die();
            }
            
            $usuarioDB=$this->model->getPorMail($mail);
            if($mail === $usuarioDB->mail){
                $this->view->showFormRegistro("Ya existe un usuario registrado con ese email");
                die();
            }
            $hash= password_hash($password, PASSWORD_DEFAULT);

            //agrega usuario
            $success= $this->model->insert($mail, $hash);
            if($success){
                $usuario = $this->model->getPorMail($mail);
                $this->authHelper->login($usuario);
                header("Location: " .BASE_URL. "home");
            } else{
                $this->recetaView->printError("No se pudo agregar el usuario", $admin);
            }
        }
/* **************************************************    ADMIN      *********************************************************** */

        function showUsuariosAdmin(){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            
            $admin= $this->authHelper->isAdmin();

            $usuarios= $this->model-> getAll();
            //actualizo la vista
            $this->recetaView->printAdminUsuarios($usuarios, $admin);

        }

/* ***********************   PERMISOS DE ADMINISTRACION  ********************* */
        function addAdmin($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $isAdmin =$this->authHelper->isAdmin();

            $admin = 1;
            $success= $this->model->addAdministrador($admin, $id);
            if($success){
                header("Location: " .BASE_URL. "adminUsuarios");
            } else{
                $this->recetaView->printError("No se pudo agregar admin", $isAdmin);
            }
        }

        function deleteAdmin($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $isAdmin =$this->authHelper->isAdmin();

            $admin = 0;
            $success= $this->model->removeAdmin($admin, $id);
            if($success){
                header("Location: " .BASE_URL. "adminUsuarios");
            }
            else{
                $this->recetaView->printError("No se pudo agregar admin", $isAdmin);
            }
        }


/* ***********************   USUARIO - DELETE   ************************* */
        function deleteUsuario($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin =$this->authHelper->isAdmin();
 
            $success= $this->model->remove($id);
            
            if($success){
                header("Location: " .BASE_URL. "adminUsuarios");
            }  
            else{
                $this->recetaView->printError("No se pudo eliminar el usuario", $admin);
            }
        }
    }