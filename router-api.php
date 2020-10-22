<?php
require_once 'libs/Router.php';
require_once 'app/api/api-recipe.controller.php';

// crea el router
$router = new Router();


// define la tabla de ruteo
//todos los parametros van con dos puntos siempre
$router->addRoute('recetas', 'GET', 'ApiRecipeController', 'getAll'); //obtener todas las tareas
$router->addRoute('recetas/:ID', 'GET', 'ApiRecipeController', 'get'); //obtener tarea.

$router->addRoute('recetas/:ID', 'DELETE', 'ApiRecipeController', 'delete'); 

$router->addRoute('recetas', 'POST', 'ApiRecipeController', 'crearTarea'); 

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);