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
        public function setLib($lib)
        {
            $this->_lib =$lib;
        }
        public function setSolde($solde)
        {
            $this->_solde = $solde;
        }
        public function setDevise($devise)
        {
            $this->_devise = $devise;
        }
        public function getInfo()
        {
            $retour ="<br>Le compte ".$this->_lib." appartient à ".$this->_titulaire->getNom();
            return $retour;
        }
        public function debit($amount)
        {
            $this->_solde -= $amount;
            $retour = "<br>Le compte a bien été débité de ".$amount.", le nouveau solde est de : ".$this->_solde." ".$this->_devise;
            return $retour;
        }
        public function credit($amount)
        {
            $this->_solde += $amount;
            $retour = "<br>Le compte a bien été crédité de ".$amount.", le nouveau solde est de : ".$this->_solde." ".$this->_devise;
            return $retour;
        }
        public function virement($amount,$compte)
        {
            $this->_solde -= $amount;
            $compte->_solde += $amount;
            $retour = "<br>Le compte ".$compte->_lib." a bien été crédité de ".$amount.", le nouveau solde est de : ".$compte->_solde." ".$compte->_devise."
            <br> Le solde du compte débiteur ".$this->_lib." est maintenant de :".$this->_solde;
            return $retour;
        }
    }
?>