<?php
    $nomsInput = array("Nom","Prénom","Ville");
    function afficherInput($tab){   // A function that generate inputs out of an array
        $retour =  "<form>";
        foreach ($tab as $val)
            $retour= $retour."<label>".$val." :</label><br><input type='text'><br>";
        $retour = $retour."</form>";
        return $retour;
    }
    echo afficherInput($nomsInput);
?>