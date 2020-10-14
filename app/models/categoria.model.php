<?php
include_once 'app/helpers/db.helper.php';
class CategoriaModel{
  
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DbHelper();
        //conexion a la bbdd
        $this->db = $this->dbHelper->connect();
    }

    /* -----------  devuelve todas las categorias de la db ------------ */
    function getAll() { 

      // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
      $query = $this->db->prepare('SELECT * FROM categoria'); 
      $query->execute(); 

      // 3. Obtengo la respuesta con un fetchAll 
      $categorias = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de recetas

      return $categorias;
    }

/* --------------   OBTENER UNA CATEGORIA POR ID  ------------------ */
    function getCategoria($id){
      $query = $this->db->prepare('SELECT * FROM categoria WHERE id=?'); 
      $query->execute([$id]); 

      $categoria = $query->fetch(PDO::FETCH_OBJ); 

      return $categoria; 
    }

/* ----------------  FILTRO POR CATEGORIA  ------------------------- */
    function getRecetasFiltradas($idCategoria){ //id de la categoria
        $query = $this->db-> prepare('SELECT * FROM receta WHERE id_categoria=?');
        $query->execute([$idCategoria]);
        $recetas= $query->fetchAll(PDO::FETCH_OBJ);
        
        return $recetas; //arr de las recetas de esa categoria
      }

      /* ***********************************************     ADMIN       ******************************************************* */

    /* ***********  inserta la categoria a la db  ************* */
    function insert($nombre, $descripcion) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO categoria(nombre, descripcion) VALUES (?,?)');
        $query->execute([$nombre, $descripcion]); 

        // 3. Obtengo y devuelo el ID de la categoria 
        return $this->db->lastInsertId();
      
    } 

    /* ***********  elimina la categoria de la db  ************* */
    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
  }
  
  /* ************  actualiza categoria   ********************** */
  function update($nombre, $descripcion, $id){
    $query = $this->db->prepare('UPDATE categoria SET nombre = ?, descripcion = ? WHERE id = ?');
    $query->execute([$nombre, $descripcion, $id]);
  }

}
