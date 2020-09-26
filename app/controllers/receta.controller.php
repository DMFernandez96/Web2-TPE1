<?php
    include_once 'app/models/receta.model.php';
    include_once 'app/views/receta.view.php';

    class RecetaController{
        private $model;
        private $view;

        function __construct(){
            $this->model = new RecetaModel();
            $this->view = new RecetaView();
        }

        function mostrarRecetas(){

            $recetas= $this->model-> getAll();
               //actualizo la vista
            /* $this->view->imprimirRecetas($recetas); */

            $this->view->printHome($recetas);
        }

/* ********************************************************* ADMIN  ******************************************************* */
            /**
     * Inserta una tarea en el sistema
     */
        function agregarReceta() {

            $nombre = $_POST['nombre'];
            $ingredientes = $_POST['ingredientes'];
            $calorias = $_POST['calorias'];
            $instrucciones = $_POST['instrucciones'];
            $categoria = $_POST['categoria'];
        
            // verifico campos obligatorios
            if (empty($nombre) || empty($ingredientes) || empty($instrucciones) || empty($categoria)){
                $this->view->imprimirError("Faltan datos obligatorios");
                die();
            }
            
            // inserto la tarea en la DB
            //y ademas mira si pudo insertar o no
            $success = $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria);

            // redirigimos al listado
            if($success){//si fue true (lo pudo insertar) redirige a la pag base
                header("Location: " . BASE_URL);
            }  
            else { //si no pudo insertar muestra msj de error
                $this->view->imprimirError("No pudo insertar la receta");
            }
        }

        function deleteRecipe($id){
            $this->model->remove($id);

            header("Location: " . BASE_URL. "admin"); 

        }

        //ESTO VA ACA?????
        function mostrarRecetasAdmin(){

            $recetas= $this->model-> getAll();
               //actualizo la vista
            $this->view->printAdmin($recetas);

        }

        function updateReceta($id){
            $this->model->update($id);
            header("Location: " . BASE_URL); 
        }





    }