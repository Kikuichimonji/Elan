<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $txt="Engage le jeu que je le gagne";
        if(strtolower(str_replace(" ","",$txt)) == strtolower(str_replace(" ","",strrev($txt))))
             echo "oui \"".$txt."\" est un palindrome";
        else
            echo "non ce n'est pas un palindrome"
    ?>
</body>
</html>