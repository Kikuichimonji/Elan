<?php
    class Titulaire{
            private $_nom;
            private $_prenom;
            private $_naissance;
            private $_ville;
            private $_compte = array();

            public function __construct($nom,$prenom,$naissance,$ville)
            {
                $this->_nom = $nom;
                $this->_prenom = $prenom;
                $this->_naissance = $naissance;
                $this->_ville = $ville;
            }
            public function getNom()
            {
                return $this->_nom;
            }
            public function getPrenom()
            {
                return $this->_Prenom;
            }
            public function getNaissance()
            {
                return $this->_naissance;
            }
            public function getVille()
            {
                return $this->_ville;
            }
            public function getCompte()
            {
                $retour = "<br>".$this->_nom." ".$this->_prenom." à ".sizeof($this->_compte)." compte :";
                foreach($this->_compte as $tab)
                    $retour .= "<br> - ".$tab->getlib()." avec ".$tab->getSolde()." ".$tab->getDevise() ;
                return $retour;
            }
            public function setCompte($compte1)
            {
                $this->_compte[] = $compte1;
            }
        }
    class Compte{
        private $_lib;
        private $_solde;
        private $_devise;
        private $_titulaire;

        public function __construct($lib,$solde,$devise,$titulaire)
        {
            $this->_lib = $lib;
            $this->_solde = $solde;
            $this->_devise = $devise;
            $this->_titulaire = $titulaire;
            
            $titulaire->setCompte($this);

        }
        public function getLib()
        {
            return $this->_lib;
        }
        public function getSolde()
        {
            return $this->_solde;
        }
        public function getDevise()
        {
            return $this->_devise;
        }
        public function getInfo()
        {
            $retour ="<br>Le compte".$this->_lib." appartient à ".$this->_titulaire->getNom();
            return $retour;
        }
        
    }

    
?>