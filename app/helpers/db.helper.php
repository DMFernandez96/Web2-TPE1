<?php
    class DbHelper{
        function __construct(){}

        function connect() { 
            $db = new PDO('mysql:host=localhost;'.'dbname=db_recetas;charset=utf8', 'root', '');
            return $db;
        }
    }