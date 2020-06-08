<?php
    namespace Model;

    use App\AbstractEntity;

    class Message extends AbstractEntity{

        private $id;
        private $message;
        private $datemessage;
        private $membre_id;
        private $sujet_id;
        private $deleted;
        private $dateedition;

        public function __construct($data){
            parent::hydrate($data, $this);
        }

        /**
         * Get the value of id_message
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id_message
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

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

        /**
         * Get the value of Dateedition
         */ 
        public function getDateedition()
        {
                return $this->dateedition;
        }

        /**
         * Set the value of Dateedition
         *
         * @return  self
         */ 
        public function setDateedition($dateedition)
        {
                $this->dateedition = $dateedition;

                return $this;
        }
    }


?>