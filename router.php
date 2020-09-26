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
        case 'categorias': //2da pag publica
            $controller= new CategoriaController();
            $controller->showCategorias();
            break;
        case 'admin':
            $controller= new RecetaController();
            $controller->mostrarRecetasAdmin();
            break;
         case 'insertarReceta': //form de admin
            $controller= new RecetaController();
            $controller->agregarReceta();
            break;
        case 'eliminarReceta': // eliminar/:ID
            $controller= new RecetaController();
            $id= $params[1];
            $controller->deleteRecipe($id);
            break;
        case 'editarReceta': //seguirlo!
            $controller= new RecetaController();
            $id= $params[1];
            $controller->updateReceta($id);
        break;

        // CATEGORIA-- ADMIN
      /*   case 'insertarCategoria': //form de admin
                $controller= new RecetaController();
                $controller->agregarReceta();
                break;
        case 'eliminarCategoria': // eliminar/:ID
                $controller= new RecetaController();
                $id= $params[1];
                $controller->deleteRecipe($id);
                break;  */
    
        default:
            header("HTTP/1.0 404 Not Found");  //en el router imprime un 404 en consola    
            echo('404 Page not found');
            break;
}
