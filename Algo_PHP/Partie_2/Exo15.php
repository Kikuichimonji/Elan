<?php
    $mail = ["elan@elan-formation.fr","contact@elan"];

    foreach($mail as $verif)  // A function that check if an email is valid
    {
        if(filter_var($verif,FILTER_VALIDATE_EMAIL))
            echo "L'adresse ".$verif." est une adresse e-mail valide<br>";
        else
            echo "L'adresse ".$verif." n'est pas une adresse e-mail valide";
    }
?>