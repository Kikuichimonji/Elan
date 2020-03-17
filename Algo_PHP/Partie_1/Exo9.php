<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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