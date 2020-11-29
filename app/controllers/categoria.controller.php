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
            $admin= $this->authHelper->isAdmin();
            //actualizo la vista
            $this->view->printCategorias($categorias, $logueado, $admin);
        }

       
        function showFiltroCategorias($idCategoria){
            $recetasFiltradas = $this->model->getRecetasFiltradas($idCategoria);
            $logueado= $this->authHelper->isLogueado();
            $admin= $this->authHelper->isAdmin();
            $this->view->printRecetasFiltradas($recetasFiltradas, $logueado, $admin); //lista filtrada de recetas
              
        }

        /* ******************************* ADMIN  ********************************************************* */
    
        function showCategoriasAdmin(){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $categorias= $this->model-> getAll();
            $this->view->printAdminCategorias($categorias, $admin); 
        }

        function addCategoria(){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];

            if (empty($nombre)){
                $this->view->printError("Faltan datos obligatorios", $admin);
                die();
            }

            $success = $this->model->insert($nombre, $descripcion);
             // redirigimos al listado
             if($success){
                header("Location: " . BASE_URL. "adminCategorias");
            }  
            else { 
                $this->view->printError("No pudo insertar la categoria", $admin);
            }

        }

        function deleteCategoria($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            
            $this->model->remove($id);
            header("Location: " . BASE_URL. "adminCategorias"); 
        }

        
/* ------------------  EDITAR  ------------------------- */
        function showFormEditarCategoria($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();
            
            $categoria=$this->model->getCategoria($id);
            $this->view->printFormEditarCategoria($categoria, $admin);
        }

        function updateCategoria($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $cat_id = $id;
            $nombre= $_POST['nombreActualizado'];
            $descripcion = $_POST['descripcionActualizado'];

            if (empty($nombre) || empty($cat_id)){
                $this->view->printError("Faltan datos obligatorios", $admin);
                die();
            }

            $this->model->update($nombre, $descripcion, $cat_id);
            
            header("Location: ".BASE_URL."adminCategorias");
        }
    }
            

        