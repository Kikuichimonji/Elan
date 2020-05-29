<?php
    namespace Model;
    use App\AbstractManager;

    class SujetManager extends AbstractManager
    {

        private static $classname = "Model\Sujet";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function addSujet($titre,$membre)
        {
            $sql= "INSERT INTO sujet(titresujet,membre_id) 
                   VALUES (:titre,:membre)";

            $arg= ["titre" => $titre,
                   "membre" => $membre
                  ];

            return self::insertReturn($sql,$arg);
        }

        public function getAllSujet(){

            $sql = "SELECT *
            FROM sujet
            ORDER BY datesujet desc" ;
            $arg= [];     
     
            return self::getResults(
                self::select($sql,$arg, true),
                self::$classname
            );
        }

        public function deleteAllInSujet($id){

            $sql = "DELETE 
            FROM message
            WHERE sujet_id = :id ";
            $arg= ["id" => $id];     

            return  self::delete($sql,$arg);
        }
        public function deleteSujet($id){

            $sql = "DELETE 
            FROM sujet
            WHERE id_sujet = :id ";
            $arg= ["id" => $id];     

            return  self::delete($sql,$arg);
        }

        public function countMessage($id){

            $sql = "SELECT COUNT(m.id_message) AS c
                    FROM message m
                    WHERE m.sujet_id = :id";

            $arg= ["id" => $id
                  ];

            return  self::select($sql,$arg, false)['c'];

        }
        public function findOneById($id){
            $sql = "SELECT * 
                    FROM sujet 
                    WHERE id_sujet = :id";
            $arg= ["id" => $id];
            return self::getOneOrNullResult(
                self::select($sql, $arg, false),
                self::$classname
            );
        }

    }

?>