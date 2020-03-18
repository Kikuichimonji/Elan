<?php
    $nomsRadio = array("Masculin","Féminin","Autre");
    function afficherRadio($tab){   // A function that generate radio buttons out of an array
        echo "<form>";
        for($i = 0;$i < count($tab);$i++)
            echo "<input type ='radio' name='Radio'<value='".$i."'> <label for'".$i."'>".$tab[$i]."</label><br>";
        echo "</form>";
    }
    afficherRadio($nomsRadio);
?>
