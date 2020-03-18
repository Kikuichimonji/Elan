<?php
    $elements = array("Monsieur","Madame","Mademoiselle");
    function alimenterListeDeroulante($tab){    // A function that generate a list out of an array
        echo "<form><select name='genre' size='1'>";
        for($i = 0;$i < count($tab);$i++)
            echo "<option>".$tab[$i];
        echo "</select></form>";
    }
    alimenterListeDeroulante($elements);
?>