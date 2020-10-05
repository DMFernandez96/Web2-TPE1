<?php
require_once ("./libs/smarty/Smarty.class.php");
    class AuthView{


        function showFormLogin(){
            $smarty = new Smarty;
            $smarty->display("./templates/formLogin.tpl");

        }


    }