
<?php   
    $age= rand ( 0 , 15 );
    $cat= "Alien";
    switch(true){
        case $age >11: $cat = "Cadet";break;
        case $age >9: $cat = "Minime";break;
        case $age >7: $cat = "Pupille";break;
        case $age >5: $cat = "Poussin";break;
        case $age <6: $cat = "Trop jeune";break;
        default : $cat = "Non gérée";
    }
    /*if($age<6)
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
        $cat="Non répertioré";*/
    echo"L’enfant qui a ".$age." ans appartient à la catégorie « ".$cat." »";
?>
