<?php

    echo "Nous somme le ".date("d/m/Y").", si votre date de naissance est le 17/01/1985 alors voici votre âge :<br>" ;

    $diff=date_diff(new DateTime('1985-01-17'),new DateTime('now'));
    echo $diff->format("%y ans %M mois %d jours");

?>