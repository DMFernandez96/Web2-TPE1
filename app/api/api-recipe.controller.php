<?php
require_once 'app/models/receta.model.php';
require_once 'app/api/api.view.php';

class ApiRecipeController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new RecetaModel();
        $this->view = new APIView();

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
            $this->view->response("La receta con el id=$idReceta se borro exitosamente", 200);
        }else{
            $this->view->response("La receta con el id=$idReceta no existe", 404);
        }
    }  
}