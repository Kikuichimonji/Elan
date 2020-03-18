<?php
    $txt = "Mon texte en parametre";  
    function convertirMajRouge($texte){     //A function that Uppercase a string and turn it red
        $texte = "<span style='color: red;'>".strtoupper($texte)."</span>";
        return $texte;
    }

    echo convertirMajRouge($txt);


?>