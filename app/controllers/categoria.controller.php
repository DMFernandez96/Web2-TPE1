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
            $this->view->printCategorias($categorias);
        }

       
          function showFiltroCategorias($idCategoria){

            /* $categorias=$this->model->getAll();
            $this->view->printCategorias($categorias); */ //imprimo la lista de cat
            $recetasFiltradas = $this->model->getRecetasFiltradas($idCategoria);
            $this->view->printRecetasFiltradas($recetasFiltradas); //lista filtrada de recetas

           /*  $recetas = $this->model->getRecetasFiltradas($id);
            if($recetas){
                $this->view->printRecetasFiltradas($recetas);
            }
            else{
                $this->view->printError("Aun no hay recetas en esta categoria");
            } */

        }

        /* ******************************* ADMIN  ********************************************************* */
        function showCategoriasAdmin(){
            $categorias= $this->model-> getAll();
            $this->view->printAdminCategorias($categorias); 

        }

        function addCategoria(){
            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];

            if (empty($nombre)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }

            $success = $this->model->insert($nombre, $descripcion);
             // redirigimos al listado
             if($success){//si fue true (lo pudo insertar) redirige a la pag base
                header("Location: " . BASE_URL. "adminCategorias");
            }  
            else { //si no pudo insertar muestra msj de error
                $this->view->printError("No pudo insertar la categoria");
            }

        }

        function deleteCategoria($id){
            $this->model->remove($id);
            header("Location: " . BASE_URL. "adminCategorias"); 
        }

        
/* ------------------  EDITAR  ------------------------- */
        function showFormEditarCategoria($id){
            $categoria=$this->model->getCategoria($id);
            $this->view->printFormEditarCategoria($categoria);
        }

        function updateCategoria($id){

            $cat_id = $id;
            $nombre= $_POST['nombreActualizado'];
            $descripcion = $_POST['descripcionActualizado'];

            if (empty($nombre) || empty($cat_id)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }

            $this->model->update($nombre, $descripcion, $cat_id);
            //actualizo la vista
            header("Location: ".BASE_URL."adminCategorias");
        }
    }
            

        