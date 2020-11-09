<?php
require_once 'app/models/receta.model.php';
require_once 'app/api/api.view.php';

class ApiRecipeController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new RecetaModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");

    }

    function getData(){ //lo transforma en un json
        return json_decode($this->data); //lee la variable data y la transforma
    }

/* *************************  Obtener todas las recetas  *************************** */
    function getAll($params=null){ //nunca usamos $params pero es buena practica ponerlo
        $recetas =$this->model->getAll();
        $this->view->response($recetas, 200);
        var_dump($recetas);
    }

    public function get($params = null){ //buena practica hacerlo opcional
        //$params es un arr asociativo con los parametros de la ruta
        $idReceta = $params[':ID'];
        $receta = $this->model->getDetalles($idReceta);
        if($receta){//si la receta existe responde eso
            $this->view->response($receta, 200); //200 es ok
        }
        else{ //sino hace un 404
            $this->view->response("La receta con el id=$idReceta no existe", 404);
        }

    }

    function delete($params = null){
        $idReceta = $params[':ID'];
        $success= $this->model->remove($idReceta);
        if($success){
            $this->view->response("La receta con el id=$idReceta se borró exitosamente", 200);
        }else{
            $this->view->response("La receta con el id=$idReceta no existe", 404);
        }
    }

    public function add($params = null){
        $body = $this->getData(); //es lo que se envia por formulario

        $nombre        = $body->nombre;
        $ingredientes  = $body->ingredientes;
        $calorias      = $body->calorias;
        $instrucciones = $body->instrucciones;
        $id_categ      = $body->id_categoria;

        $id = $this->model->insert($nombre, $ingredientes, $calorias, $instrucciones, $id_categ);

        if($id > 0){
            $this->view->response("Se agrego la receta $id exitosamente", 200);
        }else{
            $this->view->response("La receta NO se pudo insertar", 500); 
        }

    } 
    
    public function update($params = null){
        $idReceta= $params[':ID'];
        $body = $this->getData(); //es lo que se envia por formulario

        $nombre        = $body->nombre;
        $ingredientes  = $body->ingredientes;
        $calorias      = $body->calorias;
        $instrucciones = $body->instrucciones;
        $id_categ      = $body->id_categoria;

        $success = $this->model->update($nombre, $ingredientes, $calorias, $instrucciones, $id_categ, $idReceta);
    
        if($success){
            $this->view->response("Se ACTUALIZÓ la receta $idReceta exitosamente", 200);
        }else{
            $this->view->response("La receta NO se pudo actualizar", 500);
        }

    }  
}