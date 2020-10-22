<?php
    include_once 'app/models/categoria.model.php';
    include_once 'app/views/receta.view.php';

    include_once 'app/helpers/auth.helper.php';

    class CategoriaController{
        private $model;
        private $view;
        private $authHelper;

        function __construct(){
            $this->model = new CategoriaModel();
            $this->view = new RecetaView();
            $this->authHelper = new AuthHelper();
        }

        function showCategorias(){ // en pagina publica
            $categorias= $this->model-> getAll();
            $logueado= $this->authHelper->isLogueado();
            //actualizo la vista
            $this->view->printCategorias($categorias, $logueado);
        }

       
        function showFiltroCategorias($idCategoria){
            $recetasFiltradas = $this->model->getRecetasFiltradas($idCategoria);
            $logueado= $this->authHelper->isLogueado();
            $this->view->printRecetasFiltradas($recetasFiltradas, $logueado); //lista filtrada de recetas
              
        }

        /* ******************************* ADMIN  ********************************************************* */
    
        function showCategoriasAdmin(){
            $this->authHelper->checkLogueado();

            $categorias= $this->model-> getAll();
            $this->view->printAdminCategorias($categorias); 
        }

        function addCategoria(){
            $this->authHelper->checkLogueado();

            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];

            if (empty($nombre)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }

            $success = $this->model->insert($nombre, $descripcion);
             // redirigimos al listado
             if($success){
                header("Location: " . BASE_URL. "adminCategorias");
            }  
            else { 
                $this->view->printError("No pudo insertar la categoria");
            }

        }

        function deleteCategoria($id){
            $this->authHelper->checkLogueado();
            
            $this->model->remove($id);
            header("Location: " . BASE_URL. "adminCategorias"); 
        }

        
/* ------------------  EDITAR  ------------------------- */
        function showFormEditarCategoria($id){
            $this->authHelper->checkLogueado();

            $categoria=$this->model->getCategoria($id);
            $this->view->printFormEditarCategoria($categoria);
        }

        function updateCategoria($id){
            $this->authHelper->checkLogueado();

            $cat_id = $id;
            $nombre= $_POST['nombreActualizado'];
            $descripcion = $_POST['descripcionActualizado'];

            if (empty($nombre) || empty($cat_id)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }

            $this->model->update($nombre, $descripcion, $cat_id);
            
            header("Location: ".BASE_URL."adminCategorias");
        }
    }
            

        