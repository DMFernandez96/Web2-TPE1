<?php
require_once 'app/helpers/db.helper.php';

class ComentarioModel{
    private $db;
    private $helper;

    function __construct(){
        $this->helper = new DbHelper();
        $this->db = $this->helper->connect();
    }

    
    function getAll($parametros =null) { 
        $sql= 'SELECT * FROM comentario';
    
        if(isset($parametros['order'])){
            $sql .= ' ORDER BY '. $parametros['order'];
    
            if(isset($parametros['sort'])){
                $sql .= ' '. $parametros['sort'];
            }
        }
            $query = $this->db->prepare($sql); 
            $query->execute(); 
    
            $comentarios = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de comentarios
    
            return $comentarios;
    
    }

    function insert($cuerpo, $puntaje, $id_receta, $id_usuario){
        
        $query = $this->db->prepare('INSERT INTO comentario(cuerpo, puntuacion, id_receta, id_usuario) VALUES (?,?,?,?)');
        $query->execute([$cuerpo, $puntaje, $id_receta, $id_usuario]);

        return $this->db->lastInsertId();
    }


    
}
