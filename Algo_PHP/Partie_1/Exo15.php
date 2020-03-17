<?php
    class personne{
        public $_nom;
        public $_prenom ;
        public $_age;

        public function __construct($nom,$prenom,$date)
        {
            $this->_nom = $nom;
            $this->_prenom= $prenom;
            $diff=date_diff(new DateTime($date),new DateTime('now'));
            $this->_age = $diff->format("%y"); 
        }
        public function affiche()
        {

            echo $this->_nom." ".$this->_prenom." a ".$this->_age."ans <br>";
        }

    }
    $p1 = new personne("DUPONT","Michel","1980-02-19");
    $p2 = new personne("DUCHEMIN","Alice","1985-01-17");
    $p3 = new personne("ROESS","Thomas","1988-11-19");
    $p1->affiche();
    $p2->affiche();
    $p3->affiche();
    /*Créer une classe Personne (nom, prénom et date de naissance).
    Instancier 2 personnes et afficher leurs informations: nom, prénom et âge.
    $p1 = new Personne("DUPONT","Michel","1980-02-19");
    $p2 = new Personne("DUCHEMIN","Alice","1985-01-17");
    Affichage:Michel DUPONT a ...ans
                Alice DUCHEMIN a...ans*/
?>