<?php
    namespace Model;

    use App\AbstractEntity;

    class Sujet extends AbstractEntity
    {
        private $id;
        private $titresujet;
        private $datesujet;
        private $closed;
        private $membre_id;
        private $nbmessage;


        public function __construct($data){
            parent::hydrate($data, $this);
        }

       public function __toString(){
               return $this->getTitresujet();
       }

        /**
         * Get the value of id_sujet
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id_sujet
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titresujet
         */ 
        public function getTitresujet()
        {
                return $this->titresujet;
        }

        /**
         * Set the value of titresujet
         *
         * @return  self
         */ 
        public function setTitresujet($titresujet)
        {
                $this->titresujet = $titresujet;

                return $this;
        }

        /**
         * Get the value of datesujet
         */ 
        public function getDatesujet()
        {
                return $this->datesujet;
        }

        /**
         * Set the value of datesujet
         *
         * @return  self
         */ 
        public function setDatesujet($datesujet)
        {
                $this->datesujet = $datesujet;

                return $this;
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
                return $this->closed;
        }

        /**
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($closed)
        {
                $this->closed = $closed;

                return $this;
        }

        /**
         * Get the value of membre_id
         */ 
        public function getMembre_id()
        {
                return $this->membre_id;
        }
        public function getMembre()
        {
                return $this->membre_id;
        }

        /**
         * Set the value of membre_id
         *
         * @return  self
         */ 
        public function setMembre_id($membre)
        {
                $this->membre_id = $membre;

                return $this;
        }

        public function getFormatedDate()
        {
            setlocale(LC_TIME, "fr_FR");
            $date = strtotime( $this->datesujet);
            $datef = "Le ".strftime('%d %B %Y à %R',$date);
            return $datef;
        }

        /**
         * Get the value of membre_id
         */ 
        public function getNbmessage()
        {
                return $this->nbmessage;
        }

        /**
         * Set the value of membre_id
         *
         * @return  self
         */ 
        public function setNbmessage($nbmessage)
        {
                $this->nbmessage = $nbmessage;

                return $this;
        }
    }
       