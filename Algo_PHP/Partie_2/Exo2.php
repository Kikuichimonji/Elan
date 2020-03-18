<?php
    $capitales= array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome");

    function afficherTableHTML($tab)    // A function that return a table of countries and Capital Cities
    {
        asort($tab);
        echo "<table  border='1' style='text-align : left'><tr><th><b>Pays</b></th><th><b>Capitale</b></th></tr>";
        foreach($tab as $country => $capital)
        {
            echo "<tr><th>".strtoupper($country)."</th><th>".$capital."</th></tr>";
        }
        echo "</table>";
    }

    afficherTableHTML($capitales);
?>