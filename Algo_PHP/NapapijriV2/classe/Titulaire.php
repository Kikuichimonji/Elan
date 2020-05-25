<?php
    namespace Classe;
    
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

            //getter
            public function getNom()
            {
                return $this->_nom;
            }
            public function getPrenom()
            {
                return $this->_prenom;
            }
            public function getNaissance()
            {
                return $this->_naissance;
            }
            public function getVille()
            {
                return $this->_ville;
            }

            //setter
            public function setNom($nom)
            {
                $nom = $this->_nom;
            }
            public function setPrenom($prenom)
            {
                $prenom = $this->_prenom;
            }
            public function setNaissance($naissance)
            {
                $naissance = $this->_naissance;
            }
            public function setVille($ville)
            {
                $ville = $this->_ville;
            }

            
            public function getInfo()
            {
                $naissance = new \DateTime($this->_naissance);
                $now = new \DateTime();
                $age = $now->diff($naissance);

                $retour = "<br>".$this->_nom." ".$this->_prenom." ".$age->y." ans, a ".sizeof($this->_compte)." compte :";
                foreach($this->_compte as $tab)
                    $retour .= "<br> - ".$tab->getlib()." avec ".$tab->getSolde()." ".$tab->getDevise() ;
                return $retour;
            }
            public function setCompte($compte1)
            {
                $this->_compte[] = $compte1;
            }
        }
    
?>