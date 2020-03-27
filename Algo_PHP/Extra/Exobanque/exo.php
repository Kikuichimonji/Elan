<?php
      include "class_banque.php";

      $jean = new Titulaire("Valjean","Jean","1988-11-19","Munster");
      $compte1 = new Compte("test",50,"euro",$jean);
      $compte2 = new Compte("test2",800,"franc",$jean);

      echo $jean->getCompte();
      echo $compte1->getInfo();


 ?>

