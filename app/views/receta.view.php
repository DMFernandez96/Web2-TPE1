<?php
   
    class RecetaView{

        function printHome($recetas){
            include 'templates/header.php';
            include 'templates/home.php';
            printHome();

            echo"<h3><em>Listado de recetas</em></h3>";
            echo "<ul class='list-group mt-2'>";
            foreach($recetas as $receta) {
                echo "<li class='list-group-item'>
                        $receta->nombre | $receta->id_categoria | $receta->calorias 
                        <a class='btn btn-primary btn-sm' href='detallar/$receta->id'> VER DETALLES</a> 
                    </li>"; //el link tiene forma de boton con esas clases de bootstrap
            }
            echo "</ul>";

            include 'templates/footer.php';
            
        }

        function printCategorias($categorias){
            include 'templates/header.php';
            include 'templates/home.php';  //capaz hacer un sections y agrupar todo
            printPagCategorias();

            echo"<h3><em>Listado de categorias</em></h3>";
            echo "<ul class='list-group mt-2'>";
            foreach($categorias as $categoria) {
                echo "<li class='list-group-item'>
                        $categoria->nombre 
                        <a class='btn btn-primary btn-sm' href='listarRecetas/$categoria->id'> Ver recetas</a> 
                    </li>"; //el link tiene forma de boton con esas clases de bootstrap
            }
            echo "</ul>";

            include 'templates/footer.php';

        }

        function imprimirError($mensaje){
            echo $mensaje;
        }

        function printAdmin($recetas){
            include 'templates/header.php';
            echo "aca va el login";
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

    }
   