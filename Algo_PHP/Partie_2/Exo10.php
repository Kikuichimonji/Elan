<?php

    $nomsInput = array("Nom","Prénom","Email","Ville","Sexe");
    $elements = array("Développeur Logiciel","Designer web","Intégrateur","Chef de projet");

    function afficherInput($tab){
        for($i = 0;$i < count($tab);$i++)
            echo "<label>".$tab[$i]." :</label><br><input type='text'><br>";
    }
    
    
    function alimenterListeDeroulante($tab){
        echo "<br><select name='genre' size='1'>";
        for($i = 0;$i < count($tab);$i++)
            echo "<option>".$tab[$i];
        echo "</select><br>";
    }
    echo "<form>";
    afficherInput($nomsInput);
    alimenterListeDeroulante($elements);
    echo "<br><input type='submit' formaction='#' value='Envoyer'>";
    echo "</form>";

    /*En utilisant l’ensemble des fonctions personnalisées crées précédemment, 
    créer un formulaire complet qui contient les informations suivantes: 
    champs de texte avec nom, prénom, adresse e-mail, ville,  sexe  
    et  une  liste  de  choix  parmi  lesquels  on  pourra sélectionner 
    un  intitulé  de  formation: «Développeur Logiciel»,«Designer web», «Intégrateur» 
    ou «Chef de projet».Le formulaire devra également comporter un bouton 
    permettant de le soumettre à un traitement de validation (submit).*/
?>