<?php
    namespace Model;
    use App\AbstractManager;

    class MessageManager extends AbstractManager
    {

        private static $classname = "Model\Message";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function addMessage($message,$membre,$sujet)
        {
            $sql= "INSERT INTO message(message,membre_id,sujet_id) 
                   VALUES (:message,:membre,:sujet)";

            $arg= ["message" => $message,
                   "membre" => $membre,
                   "sujet" => $sujet
                  ];

            return self::insert($sql,$arg);
        }


        public function getAllMessageBySujet($sujet){

            $sql = "SELECT *
            FROM message
            WHERE sujet_id = :sujet
            ORDER BY datemessage " ;
            $arg= ["sujet" => $sujet];     
     
            return self::getResults(
                self::select($sql,$arg, true),
                self::$classname
            );
        }

        public function getAllMessageByMembre($membre){

            $sql = "SELECT *
            FROM message
            WHERE membre_id = :membre
            ORDER BY datemessage desc" ;
            $arg= ["membre" => $membre];     
     
            return self::getResults(
                self::select($sql,$arg, true),
                self::$classname
            );
        }

        public function deleteMessage($id){

            /*$sql = "DELETE
            FROM message
            WHERE id_message = :id ";
            $arg= ["id" => $id];     

            return  self::delete($sql,$arg);*/

            $sql = "UPDATE message
            SET deleted = 1
            WHERE id_message = :id ";
            $arg= ["id" => $id];     

            return  self::update($sql,$arg);
        }

        public function findOneById($id){
            $sql = "SELECT * 
                    FROM message 
                    WHERE id_message = :id";
            $arg= ["id" => $id];
            return self::getOneOrNullResult(
                self::select($sql, $arg, false),
                self::$classname
            );
        }

        
    }

?>