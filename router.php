<?php
    include_once 'app/controllers/receta.controller.php';
    include_once 'app/controllers/categoria.controller.php';


    // defino la base url para la construccion de links con urls semánticas
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // lee la acción
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; // acción por defecto si no envían
    }

    // parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
    $params = explode('/', $action);

    switch ($params[0]) {
        case 'home': //home
            $controller= new RecetaController();
            $controller->mostrarRecetas();
            break;
        case 'detallar':
            $controller= new RecetaController();
            $controller->showDetallesReceta();
            break;

        case 'categorias': //2da pag publica. muestra lista de categ
            $controller= new CategoriaController();
            $controller->showCategorias();
            break;
        case 'admin': //muestra. TENDRIA QUE CAMBIARLO POR EL LOGIN (HACER EL FORM)
            $controller= new RecetaController();
            $controller->mostrarRecetasAdmin();
            break;
        case 'adminRecetas': //link dentro de admin para ABM de recetas
            $controller= new RecetaController();
            $controller->mostrarRecetasAdmin();
        break;
        case 'adminCategorias': //link dentro de admin para ABM de categorias
            $controller= new CategoriaController();
            $controller->showCategoriasAdmin(); 
            break;
        case 'insertarReceta': //form de admin. boton agregar
            $controller= new RecetaController();
            $controller->agregarReceta();
            break;
        case 'eliminarReceta': // eliminar/:ID    es el boton borrar 
            $controller= new RecetaController();
            $id= $params[1];
            $controller->deleteRecipe($id);
            break;
        case 'editarReceta': //seguirlo!hace aparecer 
            $controller= new RecetaController();
            $controller->showUpdateFormRecetas();
            break;
        case 'actualizarReceta': //boton del form editar
            $controller= new RecetaController();
            $id= $params[1];
            $controller->updateReceta($id);
            break;

        // CATEGORIA-- ADMIN
        case 'insertarCategoria': //boton agregar
                $controller= new CategoriaController();
                $controller->addCategoria();
                break;
        case 'eliminarCategoria': // eliminar/:ID   boton eliminar
                $controller= new CategoriaController();
                $id= $params[1];
                $controller->deleteCategoria($id);
                break; 
        case 'editarCategoria':  //form editar categoria
          
            break;
        case 'actualizarCategoria':

        break;
        default:
            header("HTTP/1.0 404 Not Found");  //en el router imprime un 404 en consola    
            echo('404 Page not found');
            break;
}
