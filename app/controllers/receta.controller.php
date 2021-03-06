<?php
    include_once 'app/models/receta.model.php';
    include_once 'app/views/receta.view.php';
    include_once 'app/models/categoria.model.php';
    include_once 'app/models/comentario.model.php';
    include_once 'app/helpers/auth.helper.php';

    class RecetaController{
        private $model;
        private $comentarioModel;
        private $view;

        private $categoriaModel;
        private $authHelper;

        function __construct(){
            $this->model = new RecetaModel();
            $this->comentarioModel = new ComentarioModel();
            $this->view = new RecetaView();
            $this->categoriaModel =new CategoriaModel();
            $this->authHelper = new AuthHelper();
        }
/* *******************************************     PUBLICO    *************************************************************** */
        function showRecetas(){
            $recetas= $this->model-> getAll();
            $logueado= $this->authHelper->isLogueado();
            $admin= $this->authHelper->isAdmin();

            $this->view->printHome($recetas, $logueado, $admin);
        }
           
        function showDetallesReceta($id){
            $logueado= $this->authHelper->isLogueado();
            $detalles= $this->model->getDetalles($id);
            $admin= $this->authHelper->isAdmin();

            if($detalles) {
                $this->view->printDetalles($detalles, $logueado, $admin);
            }
            else {
                $this->view->printError("No existe la receta", $admin);
            }
        } 


/* ********************************************************* ADMIN  ******************************************************* */

        //construye un nombre unico de archivo y lo mueve  mi carpeta de images
        function uniqueSaveName($nombreReal, $nombreTemporal){
            $filePath = "images/" . uniqid("", true) . "."
                . strtolower(pathinfo($nombreReal, PATHINFO_EXTENSION));

            // obtenemos algo como “img/123127843873.jpg”
            move_uploaded_file($nombreTemporal, $filePath); 

            return $filePath; //devuelvo ese nombre real

        }

        /* ----------------  INSERTAR RECETA  ------------------- */
        function addReceta() { 
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $nombre = $_POST['nombre'];
            $ingredientes = $_POST['ingredientes'];
            $calorias = $_POST['calorias'];
            $instrucciones = $_POST['instrucciones'];
            $categoria = $_POST['categoria'];
        
            if (empty($nombre) || empty($ingredientes) || empty($instrucciones) || empty($categoria)){
                $this->view->printError("Faltan datos obligatorios", $admin);
                die();
            }  

            // inserto la receta en la DB
            if($_FILES['input_name']['type'] == "image/jpg" ||
                $_FILES['input_name']['type'] == "image/jpeg" ||
                $_FILES['input_name']['type'] == "image/png"){ 
                    $imgNombreReal= $this->uniqueSaveName($_FILES['input_name']['name'], 
                                                            $_FILES['input_name']['tmp_name']); 

                    $success= $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria, $imgNombreReal);
                }
            else{
                $success= $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $categoria);
            }

            if($success){
                header("Location: " . BASE_URL. "adminRecetas");
            }  
            else { 
                $this->view->printError("No pudo insertar la receta", $admin);
            }

            
        }

        function showRecetasAdmin(){ 
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $recetas= $this->model-> getAll();
            $categorias=$this->categoriaModel->getAll();
            //actualizo la vista
            $this->view->printAdminRecetas($recetas, $categorias, $admin);    
        }

        /* -----------------   BORRAR RECETA  ------------------ */
        function deleteReceta($id){  
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            
            $this->model->remove($id);

            header("Location: " . BASE_URL. "adminRecetas"); 
        }

        /* ------------------  EDITAR  ------------------------- */
        function showFormEditarReceta($id){ 
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin= $this->authHelper->isAdmin();

            $receta=$this->model->getDetalles($id);

            $categorias=$this->categoriaModel->getAll();

            $this->view->printFormEditarReceta($receta, $categorias, $admin);

        }

        function updateReceta($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin=$this->authHelper->isAdmin();

            $rec_id = $id;
            $nombre = $_POST['nombreActualizado'];
            $ingredientes = $_POST['ingredientesActualizado'];
            $calorias = $_POST['caloriasActualizado'];
            $instrucciones = $_POST['instruccionesActualizado'];
            $categ = $_POST['categoriaActualizado'];
        

            if (empty($rec_id) || empty($nombre) || empty($ingredientes) || empty($instrucciones) || empty($categ)){
                $this->view->printError("Faltan datos obligatorios", $admin);
                die();
            }
    
            // inserto la receta en la DB
            if($_FILES['input_name']['type'] == "image/jpg" ||
            $_FILES['input_name']['type'] == "image/jpeg" ||
            $_FILES['input_name']['type'] == "image/png"){ 
                $imgNombreReal= $this->uniqueSaveName($_FILES['input_name']['name'], 
                                                        $_FILES['input_name']['tmp_name']); 

                $success= $this->model->update($nombre, $ingredientes, $calorias, $instrucciones, $categ, $rec_id, $imgNombreReal);
            }
            else{
                $success= $this->model->update($nombre, $ingredientes, $calorias, $instrucciones, $categ, $rec_id);
            }

            if($success){
                header("Location: " . BASE_URL. "adminRecetas");
            }  
            else { 
                $this->view->printError("No pudo actualizar la receta", $admin);
            }
 
        }

        function deleteImagen($id){
            $this->authHelper->checkLogueado();
            $this->authHelper->checkIsAdmin();
            $admin=$this->authHelper->isAdmin();

            $receta= $this->model->getDetalles($id);
            
            $nombre= $receta->nombre;
            $ing= $receta->ingredientes;
            $cal= $receta->calorias;
            $inst= $receta->instrucciones;
            $categ= $receta->id_categoria;
            $idReceta= $receta->id;
            $img= $receta->imagen;

            $this->model->deleteImg($nombre, $ing, $cal, $inst, $categ, $idReceta, $img);
            header("Location: " .BASE_URL. "adminRecetas");
        }
    }