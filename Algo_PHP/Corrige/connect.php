<?php try{
        $link = new PDO("mysql:host=localhost:3306;dbname=client","root","",[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }
 ?>