<?php
    namespace Model;
    use App\AbstractManager;

    class MembreManager extends AbstractManager
    {

        private static $classname = "Model\Membre";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function getMembre($username){

            $sql = "SELECT *
            FROM membre 
            WHERE LOWER(username) = :username";
            $arg= ["username" => $username];     
     
            return self::getOneOrNullResult(
                self::select($sql,$arg, false),
                self::$classname
            );
        }

        public function addMembre($username,$mail,$pwd){

            $sql= "INSERT INTO membre(username,mail,password) 
                   VALUES (:name,:mail,:pwd)";
            $arg= ["name" => $username,
                   "mail" => $mail,
                   "pwd" => $pwd
                  ];
            
            return self::insert($sql,$arg);
        }
        public function auth_check($auth)
        {   
            $sql= "SELECT * 
                   FROM membre
                   WHERE auth = :auth";
            $arg= ["auth" => $auth];     
            
            return self::getOneOrNullResult(
                self::select($sql,$arg, false),
                self::$classname
            );
        }
    

        public function getMembreFromMail($mail)
        {

            $sql="SELECT * 
                    FROM membre 
                    WHERE mail =:mail";      //Recuperation de la liste des client de la BDD correspondant au mail entré
            $arg= ["mail" => $mail];
            return self::getOneOrNullResult(
                self::select($sql,$arg, false),
                self::$classname
            );
        }

        public function setAuth($auth,$mail)
        {
            $sql= "UPDATE membre 
                    SET auth = :auth     
                    WHERE mail = :mail";
            $arg= ["auth" => $auth,
                   "mail" => $mail];
            
            return self::insert($sql,$arg);

        }

        public function findAll(){
            $sql = "SELECT * FROM membre";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * 
                    FROM membre 
                    WHERE id_membre = :id";
            $arg= ["id" => $id];
            return self::getOneOrNullResult(
                self::select($sql, $arg, false),
                self::$classname
            );
        }

        public function countMessage($id){

            $sql = "SELECT COUNT(m.id_message) AS c
                    FROM message m
                    WHERE m.membre_id = :id";

            $arg= ["id" => $id
                  ];

            return  self::select($sql,$arg, false)['c'];

        }

        public function countSujet($id){

            $sql = "SELECT COUNT(s.id_sujet) AS c
                    FROM sujet s
                    WHERE s.membre_id = :id";

            $arg= ["id" => $id
                  ];

            return  self::select($sql,$arg, false)['c'];

        }

    }

?>