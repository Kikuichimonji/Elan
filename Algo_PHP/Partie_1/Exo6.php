
<?php
    $prix = 9.99;
    $quant = 5 ;
    $tva = 0.2;

    echo"Prix unitaire de l’article:".$prix." €
    <br>Quantité: ".$quant."
    <br>Taux de TVA: ".$tva*100 ." %
    <br>Le montant de la facture à régler est de : 
    ".(($prix*$quant)+($prix*$quant)*$tva)." €";

    //$prixTTC = $prix * $quant * (1 + $tva)
?>
