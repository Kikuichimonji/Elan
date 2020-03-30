<?php
    include "class_Film.php";
    include "class_Real.php";
    include "class_Acteur.php";
    include "class_Genre.php";
    include "class_Role.php";

    $acteur1 = new Acteur("N/C","Youri","1958-11-24");
    $acteur2 = new Acteur("N/C","Sandy","1973-02-25");
    $acteur3 = new Acteur("Abitbol","George","1907-05-26");
    $acteur4 = new Acteur("Vandam","Jean-Claude","1960-01-01");
    $role1 = new Role("Rôle Principal");
    $role2 = new Role("Rôle Secondaire");
    $role3 = new Role("Rôle Tertaire");
    $role4 = new Role("Rôle Inconnu");
    $liste_acteurs1= [[$role1,$acteur1],[$role2,$acteur2]];
    $liste_acteurs2= [[$role1,$acteur2],[$role3,$acteur3]];
    $liste_acteurs3= [[$role1,$acteur4],[$role4,$acteur3]];
    $real1 = new real("Jeremi","Simon","1980-05-03");
    $real2 = new real("Carrey","Jim","1962-01-17");
    $genre1 = new Genre("Capitaliste");
    $genre2 = new Genre("Tragedie");
    
    $film1 = new film("Red is Dead"         ,"1994","1h30","C'est affreux"                            ,$real1,$genre1,$liste_acteurs1);
    $film2 = new film("La classe américaine","1993","1h12","Ce flim n'est pas un flim sur le cyclisme",$real1,$genre2,$liste_acteurs2);
    $film3 = new film("La baston si tu mens","2013","3h50","Ce stylo est bleu ! Et ça va barder"      ,$real2,$genre2,$liste_acteurs3);

    

    echo $film1;
    echo $film2;
    echo $film3;
    echo $real1->getFilm();
    echo $real2->getFilm();
    echo $acteur1->getFilm();
    echo $acteur2->getFilm();
    echo $acteur3->getFilm();
    echo $genre1->getFilm();
    echo $genre2->getFilm();
    echo $role1->getActeur();
    echo $role2->getActeur();
    echo $role3->getActeur();
    echo $role4->getActeur();


?>