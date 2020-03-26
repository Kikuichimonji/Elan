<?php
    $elements = array("Monsieur","Madame","Mademoiselle");
    function alimenterListeDeroulante($tab){    // A function that generate a list out of an array
        $retour = "<form><select name='genre' size='1'>";
        foreach($tab as $val)
            $retour = $retour."<option>".$val."</option>";
        $retour = $retour."</select></form>";
        return $retour;
    }
    echo alimenterListeDeroulante($elements);
?>