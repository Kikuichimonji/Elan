<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $montant = 100;
        echo "Montant en francs : ".$montant;
        echo "<br>".$montant." francs = ".round($montant/6.5596,2)." €";
    ?>
</body>
</html>