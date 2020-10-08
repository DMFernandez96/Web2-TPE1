<?php
    require_once ("./libs/smarty/Smarty.class.php");
    class AuthView{

        private $smarty;

       function  __construct(){ //pueden recibir paramentros
        $this->smarty= new Smarty(); //variable smarty q siempre va a estar
        $this->smarty->assign('titulo_s',"login");

        }


        function showFormLogin($error = null){ //$error es opcional. parametros opcionales en php
            $this->smarty->assign('error_s', $error);
            $this->smarty->display("./templates/formLogin.tpl");

        }



    }