<?php
    $elements = array("Monsieur","Madame","Mademoiselle");
    function alimenterListeDeroulante($tab){
        echo "<form><select name='genre' size='1'>";
        for($i = 0;$i < count($tab);$i++)
            echo "<option>".$tab[$i];
        echo "</select></form>";
    }
    alimenterListeDeroulante($elements);
?>