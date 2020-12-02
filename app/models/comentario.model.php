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

    function getComentariosReceta($id){
        $query= $this->db-> prepare ('SELECT comentario.*, usuario.mail AS mail FROM comentario INNER JOIN usuario ON (comentario.id_usuario=usuario.id) 
            WHERE comentario.id_receta= ?');    
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    function insert($cuerpo, $puntaje, $id_receta, $id_usuario){
        $query = $this->db->prepare('INSERT INTO comentario(cuerpo, puntuacion, id_receta, id_usuario) VALUES (?,?,?,?)');
        $query->execute([$cuerpo, $puntaje, $id_receta, $id_usuario]);

        return $this->db->lastInsertId();
    }

    function remove($id){
        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function get($id){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id=?'); 
        $query->execute([$id]);
        $c = $query->fetch(PDO::FETCH_OBJ); // un comentario

      return $c;
    }


    
}
