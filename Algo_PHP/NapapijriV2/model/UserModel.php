<?php
    require_once "connect.php";

    class UserModel extends DAO{

        public function __construct(){
            parent::connect();
        }

        public function getUser($form_user){
            try{
                $sql = "SELECT username, password 
                        FROM user 
                        WHERE LOWER(username) = :name";

                $stmt = self::$link->prepare($sql);
                $username = strtolower($form_username);
                $stmt->bindParam("name", $username);
                $stmt->execute();
                return $stmt->fetch();
            }
            catch(Exception $e){
                return $e->getMessage();
                die();
            }
        }

        public function addUser($username, $hash){
            try{
                $sql = "INSERT INTO user (username, password)
                        VALUES (:name, :pass);";
      
                $stmt = self::$link->prepare($sql);
                $stmt->bindParam("name", $username);
                $stmt->bindParam("pass", $hash);
                return $stmt->execute();
                
            }
            catch(Exception $e){
                return $e->getMessage();
                die();
            }
            
        }
        public function welcome_check($auth)
        {   
            try{
                $sql= "SELECT * FROM client WHERE auth = '$auth'";
                $stmt = self::$link->query($sql);      //Excecution de la requete
                $reponse = $stmt->fetch();      // Parcour de la table 
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }    
            return $reponse;
        }
    
        public function welcome_fill_client($mail)
        {  
            try{
                $sql= "SELECT * FROM client WHERE email = '$mail'";
                $stmt = self::$link->query($sql);      
                $reponse = $stmt->fetch();   
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                die();
            } 
            return $reponse;
        }
        public function welcome_fill_account($mail)
        {
            try{
                $sql= " SELECT b.libelee_compte,b.solde
                FROM bank_account b 
                INNER JOIN client c ON b.id_client = c.id
                WHERE c.email = '$mail'";
                $stmt = self::$link->query($sql);      
                $reponse = $stmt->fetchAll();  
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                die();
            } 
            return $reponse;
        }
        public function getUserFromMail($f_mail)
        {
            $sql="SELECT * FROM client c
                  WHERE c.email ='$f_mail'";      //Recuperation de la liste des client de la BDD correspondant au mail entré
            $stmt = self::$link->query($sql);      //Excecution de la requete
            return $stmt->fetch();
        }
        public function setAuth($auth,$f_mail)
        {
            $sql= self::$link->prepare("UPDATE client SET auth = :auth WHERE email = :email");
            $sql->execute([":auth" => "$auth",":email" => "$f_mail"]);
        }

    }

?>