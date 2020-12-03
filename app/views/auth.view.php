<?php
    require_once ("./libs/smarty/Smarty.class.php");
    class AuthView{

        private $smarty;

        function  __construct(){ 
            $this->smarty= new Smarty();    
        }

        function showFormLogin($error = null){ 
            $this->smarty->assign('titulo_s',"login");
            $this->smarty->assign('error_s', $error);
            $this->smarty->display("./templates/formLogin.tpl");
        }

        function showFormRegistro($error = null){
            $this->smarty->assign('titulo_s',"Registrarse");
            $this->smarty->assign('error_s', $error);
            $this->smarty->display("./templates/formRegistro.tpl");
        }
    }