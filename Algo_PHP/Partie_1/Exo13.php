<?php
    $note=[10,12,8,19,3,16,11,13,9];

    echo"Les notes obtenues par l'élève sont : ";
    for($i=0; $i < count($note);$i++)
    {
        echo $note[$i]." ";
        $moy = $moy + $note[$i];
    }
    echo "<br> Sa moyenne est donc de ".round($moy/count($note),2);

    // implode affiche le contenu du tableau avec le séparateur spécifié en 1er argument snas devoir nécessairement passer par une boucle
   // echo "Les notes obtenues sont : " . implode(" ",$notes);
   // echo "<br>La moyenne est de : $moyenne";
?>