<?php 
    require_once ("./libs/smarty/Smarty.class.php"); 
    class RecetaView{

        private $smarty;

        function  __construct(){ 
            $this->smarty= new Smarty();
            $this->smarty->assign('titulo_s',"Recetas");  
        }

        function printError($mensaje){
            $this->smarty->assign('msg', $mensaje);
            $this->smarty->display('./templates/error.tpl');    
        }
/* *************************************************    HOME    ***************************************************** */
        function printHome($recetas, $logueado){
            $this->smarty->assign('titulo_s',"Recetas");
            $this->smarty->assign('recetas_s', $recetas);
            $this->smarty->assign('logueado_s', $logueado);

            $this->smarty->display('./templates/home.tpl'); 
        }

        function printDetalles($detalles, $logueado){ 
            $this->smarty->assign('titulo_s',"Detalles");
            $this->smarty->assign('receta_s', $detalles);
            $this->smarty->assign('logueado_s', $logueado);
            $this->smarty->display('templates/detalles.tpl');
        }

/* **********************************************   PAGINA PUBLICA CATEGORIAS    ************************************************** */

        function printCategorias($categorias, $logueado){
            $this->smarty->assign('titulo_s',"Categorias del sitio");
            $this->smarty->assign('categorias_s', $categorias);
            $this->smarty->assign('logueado_s', $logueado);
            $this->smarty->display('templates/categorias.tpl'); 
        }

        function printRecetasFiltradas($recetas, $logueado){
                $this->smarty->assign('titulo_s' , "Lista de recetas pertenecientes a esta categoria");
                $this->smarty->assign('recetas' , $recetas);
                $this->smarty->assign('logueado_s', $logueado);
                $this->smarty->display('./templates/recetasFiltradas.tpl');              
        }


/* *********************************************    ADMINISTRADOR   *************************************************************** */

        function printAdminRecetas($recetas, $categorias){
            $this->smarty->assign('titulo_s',"Administrador-Recetas");
            $this->smarty->assign('recetas_s', $recetas);
            $this->smarty->assign('categorias_s', $categorias); //para el select
            $this->smarty->display('./templates/adminRecetas.tpl'); 
        }

        function printAdminCategorias($categorias){  
            $this->smarty->assign('titulo_s',"Administrador-Categorias");
            $this->smarty->assign('categorias_s', $categorias);
            $this->smarty->display('./templates/adminCategorias.tpl'); // muestro el template
        }

        /*  -----------------   EDITAR   ------------------------- */
    
        function printFormEditarReceta($receta, $categorias){  
            $this->smarty->assign('titulo_s',"Editar Receta");
            $this->smarty->assign('receta_s', $receta);
            $this->smarty->assign('categorias_s', $categorias); //para el select
            $this->smarty->display('./templates/formUpdate_receta.tpl');
        }

        function printFormEditarCategoria($categoria){ 
            $this->smarty->assign('titulo_s',"Editar categoria");
            $this->smarty->assign('categoria_s', $categoria);
            $this->smarty->display('./templates/formUpdate_categoria.tpl');
        }

    }    
   