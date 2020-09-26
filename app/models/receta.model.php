<?php

class RecetaModel{

    private $db;

    function __construct(){
        //conexion a la bbdd
        $this->db = $this->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    private function connect() { //es privada para mi. Solo la puedo llamar desde aca (no desde otro .php popr ej)
        $db = new PDO('mysql:host=localhost;'.'dbname=db_recetas;charset=utf8', 'root', '');
        //solo en mmodo desarrollo. quiero que pdo me muestre un warning
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $db;
    }

      /**
     * Devuelve todas las tareas de la base de datos.
     * getTasks
     */
    function getAll() { //es como si antes tuviera la palabra public, que es por default en php (la puedo llamar desde otros .php)

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM receta'); //en algun momento lo voy a hacer. el * quiere decir todas las columnas de la tabla (id, nombre, ingredientes, etc)
        $query->execute(); //lo hago!

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $receta = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de recetas

        return $receta;
    }

      /**
     * Inserta la tarea en la base de datos
     */
    function insert($nombre, $ingredientes, $calorias, $instrucciones, $id_categoria) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO receta(nombre, ingredientes, calorias, instrucciones, id_categoria) VALUES (?,?,?,?,?)');
        return $query->execute([$nombre, $ingredientes, $calorias, $instrucciones, $id_categoria]); //devuelve true o false (es para errores sql)

       
        // 3. Obtengo y devuelo el ID de la tarea nueva
       /*  return $this->db->lastInsertId();
       */
    } 

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM receta WHERE id = ?');
        $query->execute([$id]);
  }

  function update($id){
    $query = $this->db->prepare('UPDATE FROM receta WHERE id = ?');
    $query->execute([$id]);

  }

 

}
