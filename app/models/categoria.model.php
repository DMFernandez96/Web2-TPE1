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


    /* ***********  devuelve las categorias de la db  ************* */
    
    function getAll() { //es como si antes tuviera la palabra public, que es por default en php (la puedo llamar desde otros .php)

    // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
    $query = $this->db->prepare('SELECT * FROM categoria'); //en algun momento lo voy a hacer. el * quiere decir todas las columnas de la tabla (id, nombre, ingredientes, etc)
    $query->execute(); //lo hago!

    // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
    $categoria = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de recetas

    return $categoria;
    }

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

}
