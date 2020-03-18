<?php
    class Voiture{          // Class Voiture 
        public $_marque;
        public $_model ;
        public $_nbPortes;
        public $_vitesseActuelle;
        public $_start = false;
        public $_selfid =0;     // ID of Voiture
        public static $_id=0;   // Viariable that increment to help us with IDs

        public function __construct($marque,$model,$nbPortes)
        {
            $this->_marque = $marque;
            $this->_model= $model;
            $this->_nbPortes = $nbPortes;
            $this->_vitesseActuelle = 0;
            self::$_id++;
            $this->_selfid = self::$_id ;
        }
        public function short()         // Shortcut to write less "Peugeot 408"
        {
            return $this->_marque." ".$this->_model;
        }
        public function demarrer()      // A function to start Voiture
        {
            echo "Le véhicule ".$this->short()." démare<br>";
            $this->_start = true;
        }
        public function accelerer($vitesse)     // A function to get more speed
        {
            if($this->_start)
            {
                $this->_vitesseActuelle = $this->_vitesseActuelle + $vitesse;
                echo "Le véhicule ".$this->short()." accélère de ".$vitesse." km/h et roule à ".$this->_vitesseActuelle."<br>";
            }
            else   
                echo "Le véhicule ".$this->short()." veut accélèrer de ".$vitesse." mais il n'est pas démaré<br>";
        }
        public function ralentir($vitesse)      //A function to decelerate 
        {
            if($this->_start)
            {
                $this->_vitesseActuelle = $this->_vitesseActuelle - $vitesse;
                echo "Le véhicule ".$this->short()." ralenti de ".$vitesse." km/h et roule à ";
                if($this->_vitesseActuelle <=0)             //A check to see if Voiture goes under 0 then it stops
                {
                    $this->_vitesseActuelle = 0;
                    echo $this->_vitesseActuelle."<br>";
                    echo "Le véhicule ".$this->short()." à atteind 0 Km/h et s'arrète <br>";
                    $this->_start = false;
                }
                else   
                    echo $this->_vitesseActuelle."<br>";
                
            }
            else   
                echo "Le véhicule ".$this->short()." veut ralentir de ".$vitesse." mais il n'est pas démaré<br>";
        }
        public function stopper()       //A function to stop Voiture
        {
            echo "Le véhicule ".$this->short()." est stoppé<br>";
            $this->_start = false;
            $this->_vitesseActuelle = 0;
        }
        public function vitesse()       // A function to show the speed of Voiture
        {
            echo "Le véhicule ".$this->short()." roule à ".$this->_vitesseActuelle."<br>";

        }
        public function __toString()        // A function to show the infos of Voiture
        {
            echo "<br><br>Infos véhicule ".$this->_selfid."
            <br>***********
            <br>Nom et modèle du véhicule : ".$this->short()."
            <br>Nombres de portes : ".$this->_nbPortes."
            <br>Le véhicule est ";
            if($this->_start)
                echo "Démaré";
            else
                echo "Arreté";
            echo"<br>Sa vitesse actuelle est de : ".$this->_vitesseActuelle." Km/h<br><br>";

        }
    }


    $v1 = new Voiture("Peugeot","408",5);
    $v2 = new Voiture("Citroën","C4",3);
    $v3 = new Voiture("Volkswagen","Passat",5);
    $v1->demarrer();
    $v1->accelerer(50);
    $v1->accelerer(20);
    $v1->vitesse();
    $v1->vitesse();
    $v2->demarrer();
    $v2->accelerer(80);
    $v1->stopper();
    $v1->accelerer(50);
    $v2->ralentir(20);
    $v2->ralentir(90);
    $v3->stopper();
    $v3->ralentir(20);
    $v3->demarrer();
    $v3->accelerer(200);
    echo $v1;
    echo $v2;
    echo $v3;
?>