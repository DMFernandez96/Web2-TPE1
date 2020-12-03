<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comentario.controller.php';

// crea el router
$router = new Router();

$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'getAll'); 
$router->addRoute('comentario/:ID', 'GET', 'ApiComentarioController', 'get');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentarioController', 'getComentariosReceta'); 

$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentarioController', 'delete'); //borrar

$router->addRoute('comentarios', 'POST', 'ApiComentarioController', 'add'); //agregar

$router->setDefaultRoute('ApiComentarioController', 'show404');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);