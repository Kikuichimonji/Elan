<?php
    $nomsInput = array("Nom","Prénom","Ville");
    function afficherInput($tab){   // A function that generate inputs out of an array
        echo "<form>";
        for($i = 0;$i < count($tab);$i++)
            echo "<label>".$tab[$i]." :</label><br><input type='text'><br>";
        echo "</form>";
    }
    afficherInput($nomsInput);
?>