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
            
            $this->view->printHome($recetas);
        }
           

        function showDetallesReceta($id){
            $detalles= $this->model->getDetalles($id);
            if($detalles) {
                $this->view->printDetalles($detalles);
            }
            else {
                $this->view->printError("No existe la receta");
            }
           /*  header("Location: " . BASE_URL. "detalles/$id");  */
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
                $this->view->printError("Faltan datos obligatorios");
                die();
            }
            
            // inserto la tarea en la DB
            //y ademas mira si pudo insertar o no
            $success = $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria);

            // redirigimos al listado
            if($success){//si fue true (lo pudo insertar) redirige a la pag base
                header("Location: " . BASE_URL. "admin");
            }  
            else { //si no pudo insertar muestra msj de error
                $this->view->printError("No pudo insertar la receta");
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
            $nombreActualizado = $_POST['nombreActualizado'];
            $ingredientesActualizado = $_POST['ingredientesActualizado'];
            $caloriasActualizado = $_POST['caloriasActualizado'];
            $instruccionesActualizado = $_POST['instruccionesActualizado'];
            $categActualizado = $_POST['categoriaActualizado'];

            if (empty($nombreActualizado) || empty($ingredientesActualizado) || empty($instruccionesActualizado) || empty($categActualizado)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }


            $this->model->update($nombreActualizado, $ingredientesActualizado, $caloriasActualizado, $instruccionesActualizado, $categActualizado,$id);
            header("Location: " . BASE_URL . "adminRecetas"); 
        }



    }