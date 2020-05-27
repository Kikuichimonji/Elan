<?php
    namespace Model;

    use App\AbstractEntity;

    class User extends AbstractEntity
    {
        private $id;
        private $username;
        private $password;
        private $created_at;
        private $email;
        private $nom;
        private $prenom;
        private $naissance;
        private $ville;
        private $compte = array();


        public function __construct($data){
            parent::hydrate($data, $this);
        }
    
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
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
         * Get the value of created_at
         */ 
        public function getCreated_at($format)
        {
             return $this->created_at->format($format);
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreated_at($created_at)
        {
                $this->created_at = new \DateTime($created_at);

                return $this;
        }

        public function __toString(){
            return $this->username;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom($prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of naissance
         */ 
        public function getNaissance()
        {
                return $this->naissance;
        }

        /**
         * Set the value of naissance
         *
         * @return  self
         */ 
        public function setNaissance($naissance)
        {
                $this->naissance = $naissance;

                return $this;
        }

        /**
         * Get the value of ville
         */ 
        public function getVille()
        {
                return $this->ville;
        }

        /**
         * Set the value of ville
         *
         * @return  self
         */ 
        public function setVille($ville)
        {
                $this->ville = $ville;

                return $this;
        }

        /**
         * Get the value of compte
         */ 
        public function getCompte()
        {
                return $this->compte;
        }

        public function setCompte($compte1)
        {
                $this->compte[] = $compte1;
        }


        public function getInfo()
        {
            $naissance = new \DateTime($this->naissance);
            $now = new \DateTime();
            $age = $now->diff($naissance);

            $retour = "<br>".$this->nom." ".$this->prenom." ".$age->y." ans, a ".sizeof($this->compte)." compte :";
            foreach($this->compte as $tab)
                $retour .= "<br> - ".$tab->getlib()." avec ".$tab->getSolde()." ".$tab->getDevise() ;
            return $retour;
        }
        
    }