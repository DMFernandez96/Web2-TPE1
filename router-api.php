<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comentario.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
//todos los parametros van con dos puntos siempre
$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'getAll'); //obtener todos los comentarios
$router->addRoute('comentario/:ID', 'GET', 'ApiComentarioController', 'get'); //obtener un comentario
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentarioController', 'getComentariosReceta'); //obtener c filtrados por receta

$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentarioController', 'delete'); //borrar

$router->addRoute('comentarios', 'POST', 'ApiComentarioController', 'add'); //agregar

/* $router->addRoute('comentarios/:ID', 'PUT', 'ApiComentarioController', 'update'); */ //actualizar

$router->setDefaultRoute('ApiComentarioController', 'show404');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);