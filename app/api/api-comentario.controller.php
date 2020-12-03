<?php
require_once 'app/models/comentario.model.php';
require_once 'app/api/api.view.php';
include_once 'app/helpers/auth.helper.php';

class ApiComentarioController{

    private $model;
    private $view;
    private $data;
    private $authHelper;
   
    function __construct(){
        $this->model = new ComentarioModel();
        $this->view = new APIView();
        /**Obtengo lo que tengo por post, como texto */
        $this->data = file_get_contents('php://input');
        $this->authHelper = new AuthHelper();
    }

    function getData(){ //lo transforma en un json
        return json_decode($this->data); //lee la variable data y la transforma
    }

    public function getAll($params =null){ 
        $parametros= []; 

        if(isset($_GET['sort'])){ //si existe sort
            $parametros['sort'] = $_GET['sort'];
        }

        if(isset($_GET['order'])){ //si existe order
            $parametros['order'] = $_GET['order'];
        }

        $comentarios =$this->model->getAll($parametros);
        $this->view->response($comentarios, 200);
    }

    public function add($params = null){
        $this->authHelper->checkLogueado();

        $body = $this->getData(); //es lo que se envia por formulario

        $cuerpo        = $body->cuerpo;
        $puntaje       = $body->puntuacion;
        $id_receta     = $body->id_receta;
        $id_usuario    = $body->id_usuario;
        

        $success = $this->model->insert($cuerpo, $puntaje, $id_receta, $id_usuario);

        if($success > 0){
            $comentario = $this->model->get($success);
            $this->view->response($comentario, 200);  
        }else{
            $this->view->response("El comentario NO se pudo insertar", 500); 
        }

    }

   function getComentariosReceta($params=null){
        $idReceta = $params[':ID'];
        $comentarios= $this->model->getComentariosReceta($idReceta);
        if($comentarios > 0){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("No hay comentarios para esta receta", 404);
        }
   }

    function delete($params = null){
        $idComentario = $params[':ID'];
        $success= $this->model->remove($idComentario);
        if($success){
            $this->view->response("El comentario con el id=$idComentario se borró exitosamente", 200);
        }else{
            $this->view->response("El comentario id=$idComentario no existe", 404);
        }
    }

    function get($params=null){
        $idComentario = $params[':ID'];
        $comentario = $this->model->get($idComentario);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("No existe el comentario con id= $idComentario", 404);
    }

    function show404($params= null){
        $this->view->response("El recurso solicitado no existe", 404);
    }
}