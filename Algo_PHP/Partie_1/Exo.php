<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exo1</h1>
    <?php
        $txt = "Notre formation DL commence aujourd'hui";
        echo $txt."<br/> Cette phrase contient ".strlen($txt)." lettres";
    ?> 

    <h1>Exo2</h1> 
    <?php 
        echo $txt."<br/> Cette phrase contient ".str_word_count ($txt,0,"'")." mots";        
    ?>

    <h1>Exo3</h1>
    <?php 
        echo $txt."<br>";
        echo $txt= str_replace("aujourd'hui","demain",$txt);
    ?>

    <h1>Exo 4</h1>
    <?php
        $txt2="Engage le jeu que je le gagne";
        if(strtolower(str_replace(" ","",$txt2)) == strtolower(str_replace(" ","",strrev($txt2))))
            echo "oui \"".$txt2."\" est un palindrome";
        else
            echo "non ce n'est pas un palindrome"
    ?>

    <h1>Exo 5</h1>
    <?php
        $montant = 100;
        echo "Montant en francs : ".$montant;
        echo "<br>".$montant." francs = ".round($montant/6.5596,2)." €";
    ?>

    <h1>Exo 6</h1>
    <?php
        $prix = 9.99;
        $quant = 5 ;
        $tva = 0.2;
        echo"Prix unitaire de l’article:".$prix." €";
        echo"<br>Quantité: ".$quant;
        echo"<br>Taux de TVA: ".$tva*100 ." %";
        echo"<br>Le montant de la facture à régler est de : ".(($prix*$quant)+($prix*$quant)*$tva)." €";
    ?>

    <h1>Exo 7</h1>
    <?php
        $age= rand ( 0 , 15 );
        $cat= "Alien";
        if($age<6)
            $cat="Trop jeune";
        else if($age>=6 && $age<=7)
            $cat="Poussin";
        else if($age>=8 && $age<=9)
            $cat="Pupille";
        else if($age>=10 && $age<=11)
            $cat="Minime";
        else if($age>11)
            $cat="Cadet";
        else
            $cat="Non répertioré";
        echo"L’enfant qui a ".$age." ans appartient à la catégorie « ".$cat." »";
    ?>

    <h1>Exo 8</h1>
    <?php
        $table = rand ( 1 , 10 );
        echo"Table de ".$table." :<br>";
        for($i = 1;$i < 11;$i++)
        {
            echo $i." x ".$table." = ".$i*$table."<br>";
        }

    ?>

    <h1>Exo 9</h1>
    <?php
    $age = rand(10,50);
    $table= ["Homme","Femme"];
    $sexe = array_rand($table,1); 
    $impot=" ";
    if(($sexe==0 && $age>20) || ($sexe==1 && $age>=18 && $age<=35))
        $impot="imposable";
    else
        $impot="non-imposable";

    echo "Age: ".$age;
    echo "<br>Sexe: ".$table[$sexe];
    echo "<br>La personne est ".$impot;
    ?>
</body>
</html>