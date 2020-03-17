<?php
    $mail = ["elan@elan-formation.fr","contact@elan"];

    foreach($mail as $verif)
    {
        if(filter_var($verif,FILTER_VALIDATE_EMAIL))
            echo "L'adresse ".$verif." est une adresse e-mail valide<br>";
        else
            echo "L'adresse ".$verif." n'est pas une adresse e-mail valide";
    }
   /* En utilisant les ressources de la page http://php.net/manual/fr/book.filter.php,
    vérifier si une adresse e-maila le bon format.
    Affichage
    L’adresse elan@elan-formation.frest une adresse e-mail valide
    L’adresse contact@elanest une adresse e-mail invalide */
?>