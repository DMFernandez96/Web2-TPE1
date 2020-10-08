<?php
    include_once 'app/models/receta.model.php';
    include_once 'app/views/receta.view.php';

    include_once 'app/models/categoria.model.php';

    class RecetaController{
        private $model;
        private $view;

        private $categoriaModel;

        function __construct(){
            $this->model = new RecetaModel();
            $this->view = new RecetaView();

            $this->categoriaModel =new CategoriaModel();
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

            //verifico que el usuario este logueado
            $this->checkLogueado();


            $recetas= $this->model-> getAll();
            $categorias=$this->categoriaModel->getAll();
               //actualizo la vista
            $this->view->printAdmin($recetas, $categorias);
            

        }

        //barrera de seguridad para el usuario logueado
        //si esta logueado esta barrera la pasa
        function checkLogueado(){
            session_start();
            if(!isset($_SESSION['ID_USER'])){ //Si no esta logueado
                header("Location: " .BASE_URL. "login");
                die(); //me aseguro q no pasa de aca.

            } 
                


        }

        /* ------------------  EDITAR  ------------------------- */
        function showFormEditarReceta($id){
            $receta=$this->model->getDetalles($id);
            $this->view->printFormEditarReceta($receta);
        }

        function updateReceta($id){
            $rec_id = $id;
            $nombre = $_POST['nombreActualizado'];
            $ingredientes = $_POST['ingredientesActualizado'];
            $calorias = $_POST['caloriasActualizado'];
            $instrucciones = $_POST['instruccionesActualizado'];
            $categ = $_POST['categoriaActualizado'];

            if (empty($rec_id) || empty($nombre) || empty($ingredientes) || empty($instrucciones) || empty($categ)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }

            $this->model->update($nombre, $ingredientes, $calorias, $instrucciones, $categ, $rec_id);

            header("Location: " .BASE_URL. "adminRecetas"); 
        }


        
       

        



    }