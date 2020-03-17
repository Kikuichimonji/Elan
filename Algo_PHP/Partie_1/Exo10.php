<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $montpaye = 148;
        $montverse = 200;
        $reste = $montverse - $montpaye;
        $subrest = 0;
        echo"Montant à payer : ".$montpaye." €
         <br> Montant versé : ".$montverse." €
         <br> Reste à payer : ".$reste." €
         <br> ***************************************************";
        $subrest = intdiv($reste,10);
        echo"<br> Rendue de monnaie : ".$subrest." billets de 10€ - ";
        $reste = $reste - $subrest*10;
        $subrest = intdiv($reste,5);
        echo $subrest." billets de 5€ - ";
        $reste =$reste - $subrest*5;
        $subrest = intdiv($reste,2);
        echo $subrest." pieces de 2€ - ";
        $reste =$reste - $subrest*2;
        echo $reste." pieces de 1€";

    ?>
</body>
</html>