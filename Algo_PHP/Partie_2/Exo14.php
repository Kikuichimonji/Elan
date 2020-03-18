<?php
    class Voiture{    // Class Voiture with 2 parameters
        protected $_marque;
        protected $_modele;

        public function __construct($marque,$model){
            $this->_marque = $marque;
            $this->_model = $model;
        }

        public function getInfos()  // A function that generates infos from Voiture
        {
            echo "<br>Marque : ".$this->_marque."<br>Model : ".$this->_model."<br>";
        }
    }

    class VoitureElec extends Voiture{   // Child Class that inherit from Voiture
        private $_autonomie;

        public function __construct($marque,$model,$autonomie){
            parent::__construct($marque,$model);
            $this->_autonomie = $autonomie;
        }

        public function getInfos()  // A function that generates infos from VoitureElec
            echo "<br>Marque : ".$this->_marque."<br>Model : ".$this->_model."<br>Autonomie : ".$this->_autonomie."<br>";
        }
    }
    $v1 = new Voiture("Peugeot","408");
    $ve1 = new VoitureElec("BMW","I3",100);

    $v1->getInfos();
    $ve1->getInfos(); 
?>