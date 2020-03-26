<?php
    $capitales= array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome","Espagne"=>"Madrid");

    function afficherTableHTML($tab) // A function that return a table of countries and Capital Cities with the wiki link assiociated 
    {
        asort($tab);
        $retour= "<table  border='1' style='text-align : left'><thead><tr><th><b>Pays</b></th><th><b>Capitale</b></th><th>Lien wiki</th></tr></thead><tbody>";
        foreach($tab as $country => $capital)
        {
            $retour= $retour."<tr><th>".mb_strtoupper($country)."</th><th>".$capital."</th><th><a href='https://fr.wikipedia.org/wiki/".$capital."' target='_blank'>Lien</a> </th></tr>";
        }
        $retour= $retour."</tbody></table>";
        return $retour;
    }

    echo afficherTableHTML($capitales);
?>