<?php

    $nomsInput = array("Nom","Prénom","Email","Ville","Sexe");
    $elements = array("Développeur Logiciel","Designer web","Intégrateur","Chef de projet");

    function afficherInput($tab){       // A function that generate inputs out of an array
        for($i = 0;$i < count($tab);$i++)
            echo "<label>".$tab[$i]." :</label><br><input type='text'><br>";
    }
    
    
    function alimenterListeDeroulante($tab){      // A function that generate a list out of an array
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
?>