<?php 
    class Film{
        private $_titre;
        private $_sortie;
        private $_duree;
        private $_synop;
        private $_real;
        private $_genre;
        private $_acteur = array();


        public function __construct($titre,$sortie,$duree,$synop,$real,$genre,$acteurs)
        {
            $this->_titre= $titre;
            $this->_sortie = $sortie;
            $this->_duree = $duree;
            $this->_synop = $synop;
            $this->_real = $real;
            $this->_genre = $genre;
            $genre->setFilm($this);
            foreach($acteurs as $act)
            {
                $this->_acteur[] = $act;
                $act[1]->setFilm($this);
                $act[0]->setActeur($act[1],$titre);
            }
            $real->setFilm($this);
        }
        //Getters
        public function getTitre()
        {
            return $this->_titre;
        }
        public function getSortie()
        {
            return $this->_sortie;
        }
        public function getDuree()
        {
            return $this->_duree;
        }
        public function getSynop()
        {
            return $this->_synop;
        }
        public function getReal()
        {
            return $this->_real;
        }
        public function getRole($acteur)
        {
            foreach($this->_acteur as $act)
                if($act[1] == $acteur)
                   $retour = $act[0];
           /* echo "<pre>";
            var_dump($this->_acteur);
            echo "</pre>";*/
            return $retour;
        }
        //Setters
        public function setTitre($titre)
        {
            $this->_titre = $titre;
        }
        public function setSortie($sortie)
        {
            $this->_sortie = $sortie;
        }
        public function setDuree($duree)
        {
            $this->_duree = $duree;
        }
        public function setSynop($synop)
        {
            $this->_synop = $synop;
        }
        public function setReal($real)
        {
            $this->_real = $real;
        }

        public function __toString()
        {
            $retour = "<br><br><strong> Titre : </strong>".$this->_titre."
            <br><strong> Genre : </strong>".$this->_genre."
            <br><strong> Sortie : </strong>".$this->_sortie."
            <br><strong> Durée : </strong>".$this->_duree."
            <br><strong> Synopsis : </strong>".$this->_synop."
            <br><strong> Réalisé par : </strong>".$this->_real->getPrenom()." ".$this->_real->getNom()."
            <br><strong> Acteurs : </strong>";
            foreach($this->_acteur as $act)
                $retour .= "<br>- ".$act[1]." (".$act[0].")";
            return $retour;
        }

        public function addActeur($acteur)
        {
            $this->_acteur[] = $acteur;
        }
    }