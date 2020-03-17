<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>