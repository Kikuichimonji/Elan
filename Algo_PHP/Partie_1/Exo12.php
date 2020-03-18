<?php
    $people = ["Mickaël" => "FRA", "Virgile" => "ESP", "Marie-Claire" => "ENG"];
    $salutations = ["FRA" => "Salut", "ESP" => "Hola", "ENG" => "Hello"];
   
    ksort($people);
    foreach($people as $name => $lang)
    {
        switch($lang){
            case "FRA" : echo "Salut ".$name."<br>";break;
            case "ESP" : echo "Hola ".$name."<br>";break;
            case "ENG" : echo "Hello ".$name."<br>";break;
            default: echo "PTDR T KI?";
        }
    }

    echo "<strong>Méthode 2 tableaux associatifs</strong><br>";
    foreach ($people as $prenom => $langue) {
    if(in_array($langue, array_keys($salutations))){
        $bonjour = $salutations[$langue];
        echo "$bonjour $prenom<br>";
    }else{
        echo "Langue non gérée pour $prenom<br>";
    }
}

?>
