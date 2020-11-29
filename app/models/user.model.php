<?php
include_once 'app/helpers/db.helper.php';
    class UserModel{
        
        private $db;
        private $dbHelper;

        function __construct(){
            $this->dbHelper =new DbHelper();
            //conexion a la bbdd
            $this->db = $this->dbHelper->connect();
        }

        function getPorMail($mail){
            $query =$this->db->prepare('SELECT * FROM usuario WHERE mail = ?');
            $query->execute([$mail]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        function insert($mail, $pass){
            $query =$this->db->prepare('INSERT INTO usuario(mail, pass, administrador) VALUES (?,?,?)');
            $query->execute([$mail, $pass, 0]);

            return $this->db->lastInsertId(); 
        }

        function getAll(){
            $sql= 'SELECT * FROM usuario';

            $query = $this->db->prepare($sql); 
            $query->execute(); 

            $usuarios = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de usuarios

            return $usuarios;
        }

        function addAdministrador($admin, $id){
            $query = $this->db->prepare("UPDATE usuario SET administrador= ? WHERE id = ?");
            $result= $query->execute([$admin, $id]); 

            return $result;
        }

        function removeAdmin($admin, $id){
            $query = $this->db->prepare("UPDATE usuario SET administrador= ? WHERE id = ?");
            $result= $query->execute([$admin, $id]); 

            return $result;
        }

        function remove($id){
            $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
            $query->execute([$id]);
            return $query->rowCount();
        }

    }