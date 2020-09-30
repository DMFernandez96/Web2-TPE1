<?php
    
    require_once "./libs/smarty/Smarty.class.php"; // ./ pq estoy adentro de view. con eso salgo
    class RecetaView{

        function imprimirError($mensaje){
            echo $mensaje;
        }

        function printHome($recetas){

            $smarty = new Smarty();
            $smarty->assign('titulo_s',"Recetas");
            $smarty->assign('recetas_s', $recetas);
            $smarty->display('templates/home.tpl'); // muestro el template
            
        }

        function printDetalles($detalles){
            include 'templates/header.php';
            foreach($detalles as $detalle) {
                echo "<li class='list-group-item'>
                       nombre: $detalle->nombre | categoria: $detalle->id_categoria | calorias: $detalle->calorias | instrucciones: $detalle->instrucciones 
                        <a class='btn btn-primary btn-sm' href='detallesRecetas'> Volver</a> 
                    </li>"; 
            }
            echo "</ul>";
            include 'templates/footer.php';




        }

        function printCategorias($categorias){
            include 'templates/header.php';
            include 'templates/sections.php';  
            printPagCategorias();

            echo"<h3><em>Listado de categorias</em></h3>";
            echo "<ul class='list-group mt-2'>";
            foreach($categorias as $categoria) {
                echo "<li class='list-group-item'>
                        $categoria->nombre 
                        <a class='btn btn-primary btn-sm' href='listarRecetas/$categoria->id'> Ver Recetas de esta categoria</a> 
                    </li>"; //el link tiene forma de boton con esas clases de bootstrap
            }
            echo "</ul>";

            include 'templates/footer.php';

        }

      

        function printAdmin($recetas){
            include 'templates/header.php';
            echo "aca va el login";
            include "templates/sections.php";
            printAdminTab();
            include 'templates/form_receta.php';

           
            echo "<h3> Recetas</h3>";
            //crea la lista en la linea 13 poner el nombre que se corresponde con el nombre que esta en la bbdd
            echo "<ul class='list-group mt-2'>";
            foreach($recetas as $receta) {
                echo "<li class='list-group-item'>
                        $receta->nombre | $receta->id_categoria | $receta->calorias 
                        <a class='btn btn-danger btn-sm' href='eliminarReceta/$receta->id'>ELIMINAR</a> 
                        <a class='btn btn-primary btn-sm' href='editarReceta/$receta->id'>Editar</a> 
                    </li>"; //el link tiene forma de boton con esas clases de bootstrap
            }
            echo "</ul>";

            include 'templates/footer.php';

        }

        function printAdminCategorias($categorias){
            include 'templates/header.php';
            include "templates/sections.php";
            printAdminTab();
            include 'templates/form_categoria.php';

            echo "<h3> Categorias</h3>";
            //crea la lista en la linea 13 poner el nombre que se corresponde con el nombre que esta en la bbdd
            echo "<ul class='list-group mt-2'>";
            foreach($categorias as $categoria) {
                echo "<li class='list-group-item'>
                        $categoria->nombre | $categoria->id | $categoria->descripcion 
                        <a class='btn btn-danger btn-sm' href='eliminarCategoria/$categoria->id'>ELIMINAR</a> 
                        <a class='btn btn-primary btn-sm' href='editarCategoria/$categoria->id'>Editar</a> 
                    </li>"; //el link tiene forma de boton con esas clases de bootstrap
            }
            echo "</ul>";

            include 'templates/footer.php';

        }
    
       /*  function printFormUpdateRecetas(){
            include 'templates/header.php';
            include "templates/sections.php";
            include 'templates/formUpdate_receta.php';
            include 'templates/footer.php';

        } */

    }    
   