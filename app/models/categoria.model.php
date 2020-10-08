<?php
/* ************************************************   TABLA CATEGORIA   ************************************************************** */
class CategoriaModel{
  
    private $db;

    function __construct(){
        //conexion a la bbdd
        $this->db = $this->connect();
    }

   /* ************  se conecta a la db   ****************/
    private function connect() { //es privada para mi. Solo la puedo llamar desde aca (no desde otro .php por ej)
        $db = new PDO('mysql:host=localhost;'.'dbname=db_recetas;charset=utf8', 'root', '');
        //solo en mmodo desarrollo. quiero que pdo me muestre un warning
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $db;
    }


    /* ***********  devuelve todas las categorias de la db  ************* */
    
    function getAll() { //es como si antes tuviera la palabra public, que es por default en php (la puedo llamar desde otros .php)

      // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
      $query = $this->db->prepare('SELECT * FROM categoria'); //en algun momento lo voy a hacer. el * quiere decir todas las columnas de la tabla (id, nombre, ingredientes, etc)
      $query->execute(); 

      // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
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


    function getRecetasFiltradas($idCategoria){ //id de la categoria
       /*  $query = $this->db-> prepare('SELECT categoria.id, receta.id_categoria,receta.nombre FROM categoria INNER JOIN receta ON receta.id_categoria = categoria.id WHERE receta.id_categoria=?'); */
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
        return $query->execute([$nombre, $descripcion]); //devuelve true o false (es para errores sql.SOLO EN ETAPA DE DESARROLLO)

        // 3. Obtengo y devuelo el ID de la tarea nueva
       /*  return $this->db->lastInsertId();
       */
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
