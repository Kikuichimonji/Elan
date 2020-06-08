<?php
    namespace Model;

    use App\AbstractEntity;

    class Membre extends AbstractEntity
    {
        private $id;
        private $username;
        private $mail;
        private $password;
        private $role;
        private $dateinscription;
        private $nbtopic;
        private $nbmesage;


        public function __construct($data){
            parent::hydrate($data, $this);
        }

       public function __toString(){
               return $this->getUsername();
       }
        /**
         * Get the value of id_membre
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id_membre
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of dateinscription
         */ 
        public function getDateinscription()
        {
                return $this->dateinscription;
        }

        /**
         * Set the value of dateinscription
         *
         * @return  self
         */ 
        public function setDateinscription($dateinscription)
        {
                $this->dateinscription = $dateinscription;

                return $this;
        }

        /**
         * Get the value of dateinscription
         */ 
        public function getNbsujet()
        {
                return $this->nbsujet;
        }

        /**
         * Set the value of dateinscription
         *
         * @return  self
         */ 
        public function setNbsujet($nbsujet)
        {
                $this->nbsujet = $nbsujet;

                return $this;
        }

        /**
         * Get the value of dateinscription
         */ 
        public function getNbmessage()
        {
                return $this->nbmessage;
        }

        /**
         * Set the value of dateinscription
         *
         * @return  self
         */ 
        public function setNbmessage($nbmessage)
        {
                $this->nbmessage = $nbmessage;

                return $this;
        }
}
    
       