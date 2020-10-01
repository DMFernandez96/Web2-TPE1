<?php
    
    require_once "./libs/smarty/Smarty.class.php"; // ./ pq estoy adentro de view. con eso salgo
    class RecetaView{

        function printError($mensaje){
            $smarty = new Smarty();
            $smarty->assign('msg', $mensaje);
            $smarty->display('templates/error.tpl');
            
        }
/* *************************************************    HOME    ***************************************************** */
        function printHome($recetas){

            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Recetas");
            $smarty->assign('recetas_s', $recetas);
            $smarty->display('templates/home.tpl'); // muestro el template
            
        }

        function printDetalles($detalles){ //id??

            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Detalles");
            $smarty->assign('receta_s', $detalles);
            $smarty->display('./templates/detalles.tpl');
        }

/* **********************************************    CATEGORIAS    ************************************************** */

        function printCategorias($categorias){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Categorias del sitio");
            $smarty->assign('categorias_s', $categorias);
            $smarty->display('templates/categorias.tpl'); 

        }

/* *********************************************    ADMINISTRADOR   ************************************************** */

        function printAdmin($recetas){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Administrador-Recetas");
            $smarty->assign('recetas_s', $recetas);
            $smarty->display('templates/admin.tpl'); 

        }

        function printAdminCategorias($categorias){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Administrador-Categorias");
            $smarty->assign('categorias_s', $categorias);
            $smarty->display('templates/adminCategorias.tpl'); // muestro el template
        }

        /*  -----------------   EDITAR   ------------------------- */
    
       /*  function printFormUpdateRecetas(){
            include 'templates/header.php';
            include "templates/sections.php";
            include 'templates/formUpdate_receta.php';
            include 'templates/footer.php';

        } */

    }    
   