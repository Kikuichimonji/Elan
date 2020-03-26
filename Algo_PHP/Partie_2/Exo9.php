<?php
    $nomsRadio = array("Masculin","Féminin","Autre");
    function afficherRadio($tab){   // A function that generate radio buttons out of an array
        $retour= "<form>";
        for($i = 0;$i < count($tab);$i++)
            $retour=$retour."<input type ='radio' name='Radio'<value='".$i."'> <label for'".$i."'>".$tab[$i]."</label><br>";
        $retour=$retour."</form>";
        return $retour;
    }
    echo afficherRadio($nomsRadio);
?>
