<?php
    $capitales= array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome","Espagne"=>"Madrid");

    function afficherTableHTML($tab) // A function that return a table of countries and Capital Cities with the wiki link assiociated 
    {
        asort($tab);
        echo "<table  border='1' style='text-align : left'><tr><th><b>Pays</b></th><th><b>Capitale</b></th><th>Lien wiki</th></tr>";
        foreach($tab as $country => $capital)
        {
            echo "<tr><th>".strtoupper($country)."</th><th>".$capital."</th><th><a href='https://fr.wikipedia.org/wiki/".$capital."' target='_blank'>Lien</a> </th></tr>";
        }
        echo "</table>";
    }

    afficherTableHTML($capitales);
?>