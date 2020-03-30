<?php
    class Acteur{
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

        public function getFilm()
        {
            $retour = "<br><br>".$this->_nom." ".$this->_prenom." a joué dans :";
            foreach($this->_film as $tab)
                $retour .= "<br> - ".$tab->getTitre()." (".$tab->getRole($this).") (".$tab->getSortie().")";
            if (sizeof($this->_film) == 0)
                $retour = "<br><br>Cet acteur n'a jamais joué dans un film";
            return $retour;
        }
        public function setFilm($film)
        {   
            $this->_film[] = $film;
           // echo "<br><br>".var_dump($this->_film);
        }

        public function __toString()
        {
            return $this->_nom." ".$this->_prenom;
        }
    }