<?php
    class Real{
        private $_nom;
        private $_prenom;
        private $_naissance;
        private $_film = array();

        public function __construct($nom,$prenom,$naissance)
        {
            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_naissance = $naissance;
        }

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


        public function getFilm()
        {
            $retour = "<br><br>".$this->_prenom." ".$this->_nom." a réalisé :";
            foreach($this->_film as $tab)
                $retour .= "<br> - ".$tab->getTitre()."  (".$tab->getSortie().")";
            if (sizeof($this->_film) == 0)
                $retour = "<br><br>Ce realisateur n'a jamais rien réalisé";
            return $retour;
        }

        public function setFilm($film)
        {
                $this->_film[] = $film;
        }
    }