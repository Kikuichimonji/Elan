<?php 

    abstract class DAO{

        protected static $link;

        protected static function connect(){
            try{
            self::$link = new PDO("mysql:host=localhost;dbname=client","root","",[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); 
            }
            catch(PDOException $e) {
                echo $e->getMessage();
                die();
            }
        }
    }
 ?>