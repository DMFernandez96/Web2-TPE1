<?php
    class UserModel{
        
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


        function getPorMail($mail){
            $query =$this->db->prepare('SELECT * FROM usuario WHERE mail = ?');
            $query->execute([$mail]);

            return $query->fetch(PDO::FETCH_OBJ);
        }



    }