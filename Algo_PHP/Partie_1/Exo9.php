<?php
    $age = rand(10,50);
    $table= ["Homme","Femme"];
    $sexe = array_rand($table,1); 

    $T1 = $sexe==0 && $age>20 ;
    $T2 = $sexe==1 && $age>=18 && $age<=35 ;   
    if( $T1 || $T2)
        $impot="imposable";
    else
        $impot="non-imposable";

    echo "Age: ".$age;
    echo "<br>Sexe: ".$table[$sexe];
    echo "<br>La personne est ".$impot;
?>
