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

        function showCategorias(){

            $categorias= $this->model-> getAll();
            //actualizo la vista
            $this->view->printCategorias($categorias);
        }

        function addCategoria(){

        }

        function deleteCategoria(){

        }

        function updateCategoria(){
            
        }
    }
            

        