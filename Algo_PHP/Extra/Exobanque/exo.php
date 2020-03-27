<?php
      include "class_Titulaire.php";
      include "class_Compte.php";


      $jean = new Titulaire("Valjean","Jean","1988-11-19","Munster");
      $compte1 = new Compte("test",50,"euro",$jean);
      $compte2 = new Compte("test2",800,"franc",$jean);
      $michel = new Titulaire("MichMuch","Michel","1988-11-19","Munster");
      $compte3 = new Compte("test3",1,"rouble",$michel);
      echo $jean->getCompte();
      echo $compte1->getInfo();
      echo $michel->getCompte();
      echo $compte3->getInfo();


 ?>

