<?php 
    require_once ("./libs/smarty/Smarty.class.php"); 
    class RecetaView{

        private $smarty;

        function  __construct(){ 
            $this->smarty= new Smarty();
            $this->smarty->assign('titulo_s',"Recetas");  
        }

        function printError($mensaje, $admin){
            $this->smarty->assign('mensaje_s', $mensaje);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/error.tpl');    
        }
/* *************************************************    HOME    ***************************************************** */
        function printHome($recetas, $logueado, $admin=null){
            $this->smarty->assign('titulo_s',"Recetas");
            $this->smarty->assign('recetas_s', $recetas);
            $this->smarty->assign('logueado_s', $logueado);
            $this->smarty->assign('admin_s', $admin);

            $this->smarty->display('./templates/home.tpl'); 
        }

        function printDetalles($detalles, $logueado, $admin){ 
            $this->smarty->assign('titulo_s',"Detalles");
            $this->smarty->assign('receta_s', $detalles);
            $this->smarty->assign('idReceta_s', $detalles->id);
            $this->smarty->assign('logueado_s', $logueado);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('templates/detalles.tpl');
        }


/* **********************************************   PAGINA PUBLICA CATEGORIAS    ************************************************** */

        function printCategorias($categorias, $logueado, $admin){
            $this->smarty->assign('titulo_s',"Categorias del sitio");
            $this->smarty->assign('categorias_s', $categorias);
            $this->smarty->assign('logueado_s', $logueado);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('templates/categorias.tpl'); 
        }

        function printRecetasFiltradas($recetas, $logueado, $admin){
                $this->smarty->assign('titulo_s' , "Lista de recetas pertenecientes a esta categoria");
                $this->smarty->assign('recetas' , $recetas);
                $this->smarty->assign('logueado_s', $logueado);
                $this->smarty->assign('admin_s', $admin);
                $this->smarty->display('./templates/recetasFiltradas.tpl');              
        }


/* *********************************************    ADMINISTRADOR   *************************************************************** */

        function printAdminRecetas($recetas, $categorias, $admin){
            $this->smarty->assign('titulo_s',"Administrador-Recetas");
            $this->smarty->assign('recetas_s', $recetas);
            $this->smarty->assign('categorias_s', $categorias); //para el select
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/adminRecetas.tpl'); 
        }

        function printAdminCategorias($categorias, $admin){  
            $this->smarty->assign('titulo_s',"Administrador-Categorias");
            $this->smarty->assign('categorias_s', $categorias);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/adminCategorias.tpl'); // muestro el template
        }

        function printAdminUsuarios($usuarios, $admin){  
            $this->smarty->assign('titulo_s',"Administrador-Usuarios");
            $this->smarty->assign('usuarios_s', $usuarios);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/adminUsuarios.tpl'); // muestro el template
        }

        

        /*  -----------------   EDITAR   ------------------------- */
    
        function printFormEditarReceta($receta, $categorias, $admin){  
            $this->smarty->assign('titulo_s',"Editar Receta");
            $this->smarty->assign('receta_s', $receta);
            $this->smarty->assign('categorias_s', $categorias); //para el select
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/formUpdate_receta.tpl');
        }

        function printFormEditarCategoria($categoria, $admin){ 
            $this->smarty->assign('titulo_s',"Editar categoria");
            $this->smarty->assign('categoria_s', $categoria);
            $this->smarty->assign('admin_s', $admin);
            $this->smarty->display('./templates/formUpdate_categoria.tpl');
        }

    }    
   