<?php
    include_once 'app/models/categoria.model.php';
    include_once 'app/views/receta.view.php';

    class CategoriaController{
        private $model;
        private $view;

        function __construct(){
            $this->model = new CategoriaModel();
            $this->view = new RecetaView();
        }

        function showCategorias(){ // en pagina publica

            $categorias= $this->model-> getAll();
            //actualizo la vista
            /* $this->view->printAdminCategorias($categorias); */
            $this->view->printCategorias($categorias);
        }

        /* ******************************* ADMIN  ********************************************************* */
        function showCategoriasAdmin(){
            $categorias= $this->model-> getAll();
            $this->view->printAdminCategorias($categorias); 

        }

        function addCategoria(){
            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];

            if (empty($nombre) || empty($descripcion) ){
                $this->view->imprimirError("Faltan datos obligatorios");
                die();
            }

            $success = $this->model->insert($nombre, $descripcion);
             // redirigimos al listado
             if($success){//si fue true (lo pudo insertar) redirige a la pag base
                header("Location: " . BASE_URL. "adminCategorias");
            }  
            else { //si no pudo insertar muestra msj de error
                $this->view->imprimirError("No pudo insertar la categoria");
            }


        }

        function deleteCategoria($id){
            $this->model->remove($id);
            header("Location: " . BASE_URL. "adminCategorias"); 
        }

        function updateCategoria($id){
            $this->model->update($id);
            header("Location: " . BASE_URL); 
        }
    }
            

        