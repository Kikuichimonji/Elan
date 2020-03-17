<?php
    $txt = "Mon texte en parametre";
    function convertirMajRouge($texte){
        $texte = "<span style='color: red;'>".strtoupper($texte)."</span>";
        return $texte;
    }

    echo convertirMajRouge($txt);
    /*Créer une fonction personnalisée convertirMajRouge()
    permettant de transformer une chaîne de caractère passée en argument en majuscules et en rouge.
    Vous devrez appeler la fonction comme suit: convertirMajRouge($texte);
    Affichage(si $texte = «Mon texte en paramètre»)MON TEXTE EN PARAMETRE*/
?>