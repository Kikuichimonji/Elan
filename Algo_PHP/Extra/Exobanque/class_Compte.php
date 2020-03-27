<?php
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
            $retour ="<br>Le compte ".$this->_lib." appartient à ".$this->_titulaire->getNom();
            return $retour;
        }
        
    }
?>