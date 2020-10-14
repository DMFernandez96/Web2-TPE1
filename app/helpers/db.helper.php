<?php
    class DbHelper{
        function __construct(){}

        function connect() { 
            $db = new PDO('mysql:host=localhost;'.'dbname=db_recetas;charset=utf8', 'root', '');
            //solo en mmodo desarrollo. quiero que pdo me muestre un warning
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
            return $db;
        }
    }