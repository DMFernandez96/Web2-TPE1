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

    function getAll($parametros =null) { 
      $sql= 'SELECT receta.*, categoria.nombre AS categoria FROM receta INNER JOIN categoria ON (receta.id_categoria = categoria.id)';

      if(isset($parametros['order'])){
        $sql .= ' ORDER BY '. $parametros['order'];

        if(isset($parametros['sort'])){
          $sql .= ' '. $parametros['sort'];
        }
      }
      /* echo($sql);
      echo(PHP_EOL);
      die(__FILE__); */

        $query = $this->db->prepare($sql); 
        $query->execute(); 

        $receta = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de recetas

        return $receta;
    }

    /* ------------   OBTENER RECETA POR ID   ------------ */
    function getDetalles($id){
      $query = $this->db->prepare('SELECT receta.*, categoria.nombre AS categoria FROM receta INNER JOIN categoria ON (receta.id_categoria = categoria.id) WHERE receta.id=?'); 
      $query->execute([$id]);
      $detalles = $query->fetch(PDO::FETCH_OBJ); // una receta

      return $detalles;
    }

    function getImgReceta($id){
      $query = $this->db->prepare('SELECT receta.imagen WHERE receta.id=?'); 
      $query->execute([$id]);
      $imagen = $query->fetch(PDO::FETCH_OBJ); // img de receta

      return $imagen;

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
    function insert($nombre, $ingredientes, $calorias, $instrucciones, $id_categoria, $imagen=null) {

      if($imagen){ 
        $sql = 'INSERT INTO receta(nombre, ingredientes, calorias, instrucciones, id_categoria, imagen) VALUES (?,?,?,?,?,?)';
        $params = [$nombre, $ingredientes, $calorias, $instrucciones, $id_categoria, $imagen];
      } else{ 
        $sql = 'INSERT INTO receta(nombre, ingredientes, calorias, instrucciones, id_categoria) VALUES (?,?,?,?,?)';
        $params = [$nombre, $ingredientes, $calorias, $instrucciones, $id_categoria];

      }

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare($sql);
        $query->execute($params); 

        // 3. Obtengo y devuelo el ID de la receta nueva
        return $this->db->lastInsertId(); 
    } 

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM receta WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
  }

  function update($nombre, $ing, $cal, $inst, $id_categ, $id, $img=null){

    if($img){ 
      $sql = 'UPDATE receta SET nombre= ?, ingredientes= ?, calorias= ?, instrucciones= ?, id_categoria = ?, imagen =? WHERE id = '.$id.' ';
      $params = [$nombre, $ing, $cal, $inst, $id_categ, $img];
    } else{ 
      $sql = 'UPDATE receta SET nombre= ?, ingredientes= ?, calorias= ?, instrucciones= ?, id_categoria = ? WHERE id ='.$id.' ';
      $params = [$nombre, $ing, $cal, $inst, $id_categ];
    }

      // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
      $query = $this->db->prepare($sql);
      $result= $query->execute($params); 
      return $result;
  }

  
/* ********************   IMAGEN   ************************ */
  function deleteImg($nombre, $ing, $cal, $inst, $id_categ, $id, $img){

     if($img){ 
      $img = null;
      $sql = 'UPDATE receta SET nombre= ?, ingredientes= ?, calorias= ?, instrucciones= ?, id_categoria = ?, imagen = ? WHERE id='.$id.' ';
      $params = [$nombre, $ing, $cal, $inst, $id_categ, $img];

      $query =$this->db->prepare($sql);
      return $query->execute($params);
    }
  }
  
}
