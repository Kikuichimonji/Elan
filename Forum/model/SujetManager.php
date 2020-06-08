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

            $sql = "SELECT s.id,s.titresujet,s.datesujet,s.closed,s.membre_id, COUNT(m.sujet_id) as nbmessage
            FROM sujet s
            INNER JOIN message m ON s.id = m.sujet_id
            GROUP BY  s.id
            UNION 
            SELECT s.id,s.titresujet,s.datesujet,s.closed,s.membre_id,0
            FROM sujet s
            WHERE s.id NOT IN (SELECT m.sujet_id
            FROM message m ) 
            GROUP BY  s.id
            ORDER BY datesujet DESC " ;
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
            WHERE id = :id ";
            $arg= ["id" => $id];     

            return  self::delete($sql,$arg);
        }

        public function findOneById($id){
            $sql = "SELECT * 
                    FROM sujet 
                    WHERE id = :id";
            $arg= ["id" => $id];
            return self::getOneOrNullResult(
                self::select($sql, $arg, false),
                self::$classname
            );
        }

        public function verSujet($id,$statut)
        {
            $sql = "UPDATE sujet
            SET closed = :statut
            WHERE id = :id ";  

            $arg= ["id" => $id,
                    "statut" => $statut ];

            return self::update($sql,$arg);
        }

    }

?>