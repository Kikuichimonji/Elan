
<?php
    $txt="Engage le jeu que je le gagne";
    if(strtolower(str_replace(" ","",$txt)) == strtolower(str_replace(" ","",strrev($txt))))
            echo "oui \"".$txt."\" est un palindrome";
    else
        echo "non ce n'est pas un palindrome"
?>
