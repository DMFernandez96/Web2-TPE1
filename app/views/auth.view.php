<?php
require_once ("./libs/smarty/Smarty.class.php");
    class AuthView{
        private $smarty;

       function  __construct(){ //pueden recibir paramentros
        $this->smarty= new Smarty;
        $this->smarty->assing('titulo_s', 'Login');

        }


        function showFormLogin($error = null){ //$error es opcional. parametros opcionales en php
            $this->smarty->assign('error_s', $error);
            $this->smarty->display("./templates/formLogin.tpl");

        }


    }