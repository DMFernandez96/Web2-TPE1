<?php
require_once 'app/models/comentario.model.php';
require_once 'app/api/api.view.php';

class ApiComentarioController{

    private $model;
    private $view;
    private $data;
   
    function __construct(){
        $this->model = new ComentarioModel();
        $this->view = new APIView();
        /**Obtengo lo que tengo por post, como texto */
        $this->data = file_get_contents('php://input');
    }

    function getData(){ //lo transforma en un json
        return json_decode($this->data); //lee la variable data y la transforma
    }

    public function getAll($params =null){ //buena practica, por mas q no usa $params
        $parametros= []; //arr vacio que se va llenando si hay cosas en el GET

        if(isset($_GET['sort'])){ //si existe sort
            $parametros['sort'] = $_GET['sort'];
        }

        if(isset($_GET['order'])){ //si existe sort
            $parametros['order'] = $_GET['order'];
        }

        $comentarios =$this->model->getAll($parametros);
        $this->view->response($comentarios, 200);
    }

    public function add($params = null){
        $body = $this->getData(); //es lo que se envia por formulario

        $cuerpo        = $body->cuerpo;
        $puntaje  = $body->puntuacion;
        $id_receta      = $body->id_receta;
        $id_usuario = $body->id_usuario;
        

        $id = $this->model->insert($cuerpo, $puntaje, $id_receta, $id_usuario);

        if($id > 0){
            $this->view->response("Se agrego comentario $id exitosamente", 200);
        }else{
            $this->view->response("El comentario NO se pudo insertar", 500); 
        }

    }

    function delete($params = null){
        $idComentario = $params[':ID'];
        $success= $this->model->remove($idComentario);
        if($success){
            $this->view->response("El comentario con el id=$idComentario se borró exitosamente", 200);
        }else{
            $this->view->response("El comentario con el id=$idComentario no existe", 404);
        }
    }

    function show404($params= null){
        $this->view->response("El recurso solicitado no existe", 404);
    }
}