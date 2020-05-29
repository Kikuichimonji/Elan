<?php
    namespace Model;

    use App\AbstractEntity;

    class Message extends AbstractEntity{

        private $id_message;
        private $message;
        private $datemessage;
        private $membre_id;
        private $sujet_id;
        private $deleted;

        public function __construct($data){
            parent::hydrate($data, $this);
        }

        /**
         * Get the value of id_message
         */ 
        public function getId_message()
        {
                return $this->id_message;
        }

        /**
         * Set the value of id_message
         *
         * @return  self
         */ 
        public function setId_message($id_message)
        {
                $this->id_message = $id_message;

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        /**
         * Get the value of datemessage
         */ 
        public function getDatemessage()
        {
                return $this->datemessage;
        }

        /**
         * Set the value of datemessage
         *
         * @return  self
         */ 
        public function setDatemessage($datemessage)
        {
                $this->datemessage = $datemessage;

                return $this;
        }

        /**
         * Get the value of membre_id
         */ 
        public function getMembre_id()
        {
                return $this->membre_id;
        }

        /**
         * Set the value of membre_id
         *
         * @return  self
         */ 
        public function setMembre_id($membre_id)
        {
                $this->membre_id = $membre_id;

                return $this;
        }

        /**
         * Get the value of sujet_id
         */ 
        public function getSujet_id()
        {
                return $this->sujet_id;
        }

        /**
         * Set the value of sujet_id
         *
         * @return  self
         */ 
        public function setSujet_id($sujet_id)
        {
                $this->sujet_id = $sujet_id;

                return $this;
        }

        /**
         * Get the value of deleted
         */ 
        public function getDeleted()
        {
                return $this->deleted;
        }

        /**
         * Set the value of deleted
         *
         * @return  self
         */ 
        public function setDeleted($deleted)
        {
                $this->deleted = $deleted;

                return $this;
        }
    }


?>