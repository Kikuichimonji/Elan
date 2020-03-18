<?php
        $montpaye = 148;
        $montverse = 200;
        $reste = $montverse - $montpaye;

        echo"Montant à payer : ".$montpaye." €
         <br> Montant versé : ".$montverse." €
         <br> Reste à payer : ".$reste." €
         <br> ***************************************************";

       /* $subrest = intdiv($reste,10);
        echo"<br> Rendue de monnaie : ".$subrest." billets de 10€ - ";
        $reste = $reste - $subrest*10;
        $subrest = intdiv($reste,5);
        echo $subrest." billets de 5€ - ";
        $reste =$reste - $subrest*5;
        $subrest = intdiv($reste,2);
        echo $subrest." pieces de 2€ - ";
        $reste =$reste - $subrest*2;
        echo $reste." pieces de 1€";*/

        $nb10 = floor($reste / 10);
        $nb5 = floor($reste / 5);
        $reste = $reste - 5 * $nb5;
        $nb2 = floor($reste / 2);
        $reste = $reste - 2 * $nb2;

        echo "Billets de 10 : $nb10<br/>";
        echo "Billets de 5 : $nb5<br/>";
        echo "Pièces de 2 : $nb2<br/>";
        echo "Pièces de 1 : $reste<br/>";
?>
