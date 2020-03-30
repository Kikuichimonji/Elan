<?php
    class Role{
        private $_lib;
        private $_acteur = array();

        public function __construct($lib)
        {
            $this->_lib = $lib;
        }

        public function __toString()
        {
            return $this->_lib;
        }

        public function setActeur($acteur,$titre)
        {
                $this->_acteur[] = [$acteur,$titre];
        }

        public function getActeur()
        {
            $retour = "<br><br>Acteur ayant joué '".$this->_lib."' :";
            foreach($this->_acteur as $tab)
                $retour .= "<br> - ".$tab[0]." (".$tab[1].")";
            if (sizeof($this->_acteur) == 0)
                $retour = "<br><br>Ce role n'a pas d'acteurs";
              /*echo "<pre>";
            var_dump($this->_acteur);
            echo "</pre>"; */ 
            return $retour;
        }
    }
?>