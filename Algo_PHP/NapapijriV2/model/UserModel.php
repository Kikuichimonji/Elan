<?php
    namespace Model;
    use App\AbstractManager;

    class UserModel extends AbstractManager
    {

        private static $classname = "Model\User";

        public function __construct(){
            self::connect();
        }

        public function getUser($form_user){

            $sql = "SELECT username, password 
            FROM user 
            WHERE LOWER(username) = :name";
            $arg= ["name" => $form_user];     
     
            return self::select($sql,$arg,false);
        }

        public function addUser($surname,$firstname,$mail,$pwd){

            $sql= "INSERT INTO client(username,email,password,nom,prenom) 
                   VALUES (:name,:mail,:pwd,:nom,:prenom)";
            $username = $surname.$firstname;
            $arg= ["name" => $username,
                   "mail" => $mail,
                   "pwd" => $pwd,
                   "nom" => $surname,
                   "prenom" => $firstname];
            
            return self::insert($sql,$arg);
        }
        public function welcome_check($auth)
        {   
            $sql= "SELECT * 
                   FROM client
                   WHERE auth = :auth";
            $arg= ["auth" => $auth];     
            
            return self::select($sql,$arg,false);
        }
    
        public function welcome_fill_client($mail)
        {  

            $sql= "SELECT * 
                   FROM client 
                   WHERE email = '$mail'"; 
            $arg= ["mail" => $mail];     
            
            return self::select($sql,$arg,false);
        }

        public function welcome_fill_account($mail)
        {
            $sql= " SELECT *
                    FROM bank_account b 
                    INNER JOIN client c ON b.id_client = c.id
                    WHERE c.email = '$mail'";
            $arg= ["mail" => $mail];     
  
            return self::select($sql,$arg,true);
        }

        public function getUserFromMail($mail)
        {

            $sql="SELECT * 
                    FROM client c
                    WHERE c.email =:mail";      //Recuperation de la liste des client de la BDD correspondant au mail entré
            $arg= ["mail" => $mail];
            return self::select($sql,$arg,false);
        }

        public function setAuth($auth,$mail)
        {
            $sql= "UPDATE client 
                    SET auth = :auth     
                    WHERE email = :mail";
            $arg= ["auth" => $auth,
                   "mail" => $mail];
            
            return self::insert($sql,$arg);

        }
    }

?>