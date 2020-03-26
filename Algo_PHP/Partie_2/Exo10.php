<?php

    $nomsInput = array("Nom","Prénom","Email","Ville","Sexe");
    $elements = array("Développeur Logiciel","Designer web","Intégrateur","Chef de projet");

    function generFormulaire($tabInput,$tabElem){       // A function that generate inputs out of an array
        $retour ="<form>";
        foreach($tabInput as $valInput)
            $retour=$retour."<label>".$valInput." :</label><br><input type='text'><br>";
    
        $retour=$retour."<br><select name='genre' size='1'>";
        foreach($tabElem as $valElem)
            $retour=$retour."<option>".$valElem;
        $retour=$retour."</select><br><br><input type='submit' formaction='#' value='Envoyer'></form>";
        return $retour;
    }
    echo generFormulaire($nomsInput,$elements);
?>