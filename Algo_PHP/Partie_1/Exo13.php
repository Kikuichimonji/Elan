<?php
    $note=[10,12,8,19,3,16,11,13,9];
    $moy=0;
    echo"Les notes obtenues par l'élève sont : ";
    for($i=0; $i < count($note);$i++)
    {
        echo $note[$i]." ";
        $moy = $moy + $note[$i];
    }
    echo "<br> Sa moyenne est donc de ".round($moy/count($note),2);
?>