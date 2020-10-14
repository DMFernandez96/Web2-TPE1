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
    }