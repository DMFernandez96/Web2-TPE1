<?php
    include_once 'app/models/receta.model.php';
    include_once 'app/views/receta.view.php';
    include_once 'app/models/categoria.model.php';
    include_once 'app/helpers/auth.helper.php';

    class RecetaController{
        private $model;
        private $view;

        private $categoriaModel;
        private $authHelper;

        function __construct(){
            $this->model = new RecetaModel();
            $this->view = new RecetaView();
            $this->categoriaModel =new CategoriaModel();
            $this->authHelper = new AuthHelper();
        }
/* *******************************************     PUBLICO    *************************************************************** */
        function showRecetas(){
            $recetas= $this->model-> getAll();
            $logueado= $this->authHelper->isLogueado();

            $this->view->printHome($recetas, $logueado);
        }
           
        function showDetallesReceta($id){
            $logueado= $this->authHelper->isLogueado();
            $detalles= $this->model->getDetalles($id);
            if($detalles) {
                $this->view->printDetalles($detalles, $logueado);
            }
            else {
                $this->view->printError("No existe la receta");
            }
        } 

/* ********************************************************* ADMIN  ******************************************************* */

        //construye un nombre unico de archivo y lo mueve  mi carpeta de img
        function uniqueSaveName($nombreReal, $nombreTemporal){
            $filePath = "images/" . uniqid("", true) . "."
                . strtolower(pathinfo($nombreReal, PATHINFO_EXTENSION));

            // obtenemos algo como “img/123127843873.jpg” (o la extensión que sea)
            move_uploaded_file($nombreTemporal, $filePath); //funcion q mueve archivos

            return $filePath; //devuelvo ese nombre real, q es lo q voy a usar en la DB

        }
        /* ----------------  INSERTAR RECETA  ------------------- */
        function addReceta() { 
            $this->authHelper->checkLogueado();

            $nombre = $_POST['nombre'];
            $ingredientes = $_POST['ingredientes'];
            $calorias = $_POST['calorias'];
            $instrucciones = $_POST['instrucciones'];
            $categoria = $_POST['categoria'];
        
            if (empty($nombre) || empty($ingredientes) || empty($instrucciones) || empty($categoria)){
                $this->view->printError("Faltan datos obligatorios");
                die();
            }  

            if($_FILES['input_name']['type'] == "image/jpg" ||
                $_FILES['input_name']['type'] == "image/jpeg" ||
                $_FILES['input_name']['type'] == "image/png"){ //si es alguno de estos formatos de imagen: (sino no lo hace)
                    $imgNombreReal= $this->uniqueSaveName($_FILES['input_name']['name'], //nombre real me aporta la extension del archivo
                                                             $_FILES['input_name']['tmp_name']); //da un nombre unico a partir de estos dos params (lo hace el sistema operativo)

                   
                    $success= $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria, $imgNombreReal);
                }
            else{
                $success= $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria);
            }

            // inserto la tarea en la DB
            /* $success = $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria); */

            // redirigimos al listado
            if($success){
                header("Location: " . BASE_URL. "adminRecetas");
            }  
            else { 
                $this->view->printError("No pudo insertar la receta");
            }
        }

        function showRecetasAdmin(){ 
            $this->authHelper->checkLogueado();

            $recetas= $this->model-> getAll();
            $categorias=$this->categoriaModel->getAll();
            //actualizo la vista
            $this->view->printAdminRecetas($recetas, $categorias);    
        }

        /* -----------------   BORRAR RECETA  ------------------ */
        function deleteReceta($id){  
            $this->authHelper->checkLogueado();
            
            $this->model->remove($id);

            header("Location: " . BASE_URL. "adminRecetas"); 
        }

        /* ------------------  EDITAR  ------------------------- */
        function showFormEditarReceta($id){ 
            $this->authHelper->checkLogueado();

            $receta=$this->model->getDetalles($id);
            $categorias=$this->categoriaModel->getAll();

            $this->view->printFormEditarReceta($receta, $categorias);
        }

        function updateReceta($id){
            $this->authHelper->checkLogueado();

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