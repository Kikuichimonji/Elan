<?php
    $capitales= ["France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"];

    function afficherTableHTML($tab)    // A function that return a table of countries and Capital Cities
    {
        ksort($tab);
        $retour = "<table  border='1' style='text-align : left'>><thead><tr><th><b>Pays</b></th><th><b>Capitale</b></th></tr></thead><tbody";
        foreach($tab as $country => $capital)
        {
            $retour = $retour."<tr><th>".mb_strtoupper($country)."</th><th>".$capital."</th></tr>";
        }
        $retour = $retour."</tbody></table>";
        return $retour;
    }

    echo afficherTableHTML($capitales);
?>