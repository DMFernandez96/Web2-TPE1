<?php
    require_once ("./libs/smarty/Smarty.class.php");
    class AuthView{

        private $smarty;

        function  __construct(){ 
            $this->smarty= new Smarty(); 
            $this->smarty->assign('titulo_s',"login");
        }

        function showFormLogin($error = null){ 
            $this->smarty->assign('error_s', $error);
            $this->smarty->display("./templates/formLogin.tpl");
        }
    }