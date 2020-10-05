<?php
    
    require_once ("./libs/smarty/Smarty.class.php"); // ./ pq estoy adentro de view. con eso salgo
    class RecetaView{

        function printError($mensaje){
            $smarty = new Smarty();
            $smarty->assign('msg', $mensaje);
            $smarty->display('./templates/error.tpl');
            
        }
/* *************************************************    HOME    ***************************************************** */
        function printHome($recetas){

            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Recetas");
            $smarty->assign('recetas_s', $recetas);
            $smarty->display('./templates/home.tpl'); // muestro el template
            
        }

        function printDetalles($detalles){ //id??

            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Detalles");
            $smarty->assign('receta_s', $detalles);
            $smarty->display('templates/detalles.tpl');
        }

/* **********************************************   PAGINA CATEGORIAS    ************************************************** */

        function printCategorias($categorias){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Categorias del sitio");
            $smarty->assign('categorias_s', $categorias);
            $smarty->display('templates/categorias.tpl'); 

        }

        function printRecetasFiltradas($recetas){
                $smarty = new Smarty ();
                $smarty->assign('titulo_s' , "Lista de recetas pertenecientes a esta categoria");
                $smarty->assign('recetas' , $recetas);
                $smarty->display('./templates/recetasFiltradas.tpl');                
        }


/* *********************************************    ADMINISTRADOR   ************************************************** */

        function printAdmin($recetas/* , $categorias */){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Administrador-Recetas");
            $smarty->assign('recetas_s', $recetas);
            $smarty->assign('categorias_s'/* , $categorias */); //para el select
            $smarty->display('./templates/admin.tpl'); 
        }

        function printAdminCategorias($categorias){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Administrador-Categorias");
            $smarty->assign('categorias_s', $categorias);
            $smarty->display('./templates/adminCategorias.tpl'); // muestro el template
        }

        /*  -----------------   EDITAR   ------------------------- */
    
        function printFormEditarReceta($receta){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Editar Receta");
            $smarty->assign('receta_s', $receta);
           /*  $smarty->assign('categoria_s', $categoria->nombre); */
            $smarty->display('./templates/formUpdate_receta.tpl');
        }

        function printFormEditarCategoria($categoria){
            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Editar categoria");
            $smarty->assign('categoria_s', $categoria);
            $smarty->display('./templates/formUpdate_categoria.tpl');
        }

    }    
   