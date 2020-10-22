<?php
include_once 'app/helpers/db.helper.php';

class RecetaModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DbHelper();
        //conexion a la bbdd
        $this->db = $this->dbHelper->connect();
    }

    function getAll() { 

        $query = $this->db->prepare('SELECT receta.*, categoria.nombre AS categoria FROM receta INNER JOIN categoria ON (receta.id_categoria = categoria.id)'); //en algun momento lo voy a hacer. el * quiere decir todas las columnas de la tabla (id, nombre, ingredientes, etc)
        $query->execute(); 

        $receta = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de recetas

        return $receta;
    }

    /* ------------   OBTENER RECETA POR ID   ------------ */
    function getDetalles($id){
      $query = $this->db->prepare('SELECT receta.*, categoria.nombre AS categoria FROM receta INNER JOIN categoria ON (receta.id_categoria = categoria.id) WHERE receta.id=?'); //en algun momento lo voy a hacer. el * quiere decir todas las columnas de la tabla (id, nombre, ingredientes, etc)
      $query->execute([$id]);
      $detalles = $query->fetch(PDO::FETCH_OBJ); // una receta

      return $detalles;
    }

    function getRecetasFiltradas($idCategoria){ 
      $query = $this->database-> prepare('SELECT categoria.id, receta.id_categoria,receta.nombre FROM categoria INNER JOIN receta ON receta.id_categoria = categoria.id WHERE receta.id_categoria=?');
      $query->execute([$idCategoria]);
      $recetas= $query->fetchAll(PDO::FETCH_OBJ);
      
      return $recetas; //arr de las recetas de esa categoria
    }


    /* ***************************************    ADMIN    ************************************************************************ */

      /**
     * Inserta la tarea en la base de datos
     */
    function insert($nombre, $ingredientes, $calorias, $instrucciones, $id_categoria) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO receta(nombre, ingredientes, calorias, instrucciones, id_categoria) VALUES (?,?,?,?,?)');
        $query->execute([$nombre, $ingredientes, $calorias, $instrucciones, $id_categoria]); 

        // 3. Obtengo y devuelo el ID de la receta nueva
        return $this->db->lastInsertId(); 
    } 

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM receta WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
  }

  function update($nombre, $ing, $cal, $inst, $id_categ, $id){
    $query = $this->db->prepare("UPDATE receta SET nombre= ?, ingredientes= ?, calorias= ?, instrucciones= ?, id_categoria = ? WHERE id = ?");
    $query->execute([$nombre, $ing, $cal, $inst, $id_categ, $id]);
  }
}
