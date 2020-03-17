<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $prix = 9.99;
        $quant = 5 ;
        $tva = 0.2;
        echo"Prix unitaire de l’article:".$prix." €";
        echo"<br>Quantité: ".$quant;
        echo"<br>Taux de TVA: ".$tva*100 ." %";
        echo"<br>Le montant de la facture à régler est de : ".(($prix*$quant)+($prix*$quant)*$tva)." €";
    ?>
</body>
</html>