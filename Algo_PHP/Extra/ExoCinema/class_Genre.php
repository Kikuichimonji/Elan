<?php
    class Genre{

        private $_lib;
        private $_film = array();

        public function __construct($lib)
        {
            $this->_lib = $lib;
        }

        public function __toString()
        {   
            return  $this->_lib;
        }

        public function setFilm($film)
        {
                $this->_film[] = $film;
        }

        public function getFilm()
        {
            $retour = "<br><br>Film du genre '".$this->_lib."' :";
            foreach($this->_film as $tab)
                $retour .= "<br> - ".$tab->getTitre()."  (".$tab->getSortie().")";
            if (sizeof($this->_film) == 0)
                $retour = "<br><br>Ce genre n'a pas de film";
            return $retour;
        }
    }