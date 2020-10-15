<?php
    include_once 'app/controllers/receta.controller.php';
    include_once 'app/controllers/categoria.controller.php';
    include_once 'app/controllers/auth.controller.php';
    include_once 'app/helpers/auth.helper.php';
    include_once 'app/helpers/db.helper.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // lee la acción
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }

    $params = explode('/', $action);

    switch ($params[0]) {
        case 'home': //home
            $controller= new RecetaController();
            $controller->showRecetas();
            break;
        case 'detalles':
            $controller= new RecetaController();
            $id= $params[1];
            $controller->showDetallesReceta($id);
            break;

        case 'categorias': //2da pag publica. muestra lista de categ
            $controller= new CategoriaController();
            $controller->showCategorias();
            break;
        case 'listarRecetas': //btn en pag categorias. FILTRO
            $controller= new CategoriaController();
            $id= $params[1];
            $controller-> showFiltroCategorias($id);
            break;
        
        /* *********************************    ADMIN    ************************************************** */
        case 'login':
            $controller= new AuthController();
            $controller->showLogin();
            break;
        case 'verificarUsuario':
            $controller= new AuthController();
            $controller->verifyUser();
            break;
        case 'logout':
            $controller= new AuthController();
            $controller->logout();
            break;
        
        case 'adminRecetas': //link dentro de admin para ABM de recetas
            $controller= new RecetaController();
            $controller->showRecetasAdmin();
            break;
        case 'adminCategorias': //link dentro de admin para ABM de categorias
            $controller= new CategoriaController();
            $controller->showCategoriasAdmin(); 
            break;

        //RECETAS-- ADMIN
        case 'insertarReceta': //form de admin. boton agregar
            $controller= new RecetaController();
            $controller->addReceta();
            break;
        case 'eliminarReceta': // eliminar/:ID boton borrar 
            $controller= new RecetaController();
            $id= $params[1];
            $controller->deleteReceta($id);
            break;
        case 'editarReceta':  
            $controller= new RecetaController();
            $id= $params[1];
            $controller->showFormEditarReceta($id);
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
            $controller= new CategoriaController();
            $id= $params[1];
            $controller->showFormEditarCategoria($id);
            break;
        case 'actualizarCategoria': //boton del form editar
            $controller= new CategoriaController();
            $id= $params[1];
            $controller->updateCategoria($id);
        break;
        default:
            header("HTTP/1.0 404 Not Found");  //en el router imprime un 404 en consola    
            echo('404 Page not found');
            break;
}
