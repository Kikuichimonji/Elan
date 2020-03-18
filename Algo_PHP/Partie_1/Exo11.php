<?php
    $table= ["Peugeot","Renault","WV","Fiat","Tesla","BMW"];
    echo "Il y a ".count($table)." marques de voitures dans le tableau:<br><ul>";

    /*for($i = 0;$i < count($table);$i++)
    {
        echo "<li>".$table[$i]."</li>";
    }
    echo "</ul>"*/

    foreach ($table as $marque)
        echo "<li>".$marque."</li>";
    echo "</ul>";
?>