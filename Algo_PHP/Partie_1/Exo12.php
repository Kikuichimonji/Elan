<?php
    $people = ["Mickaël" => "FRA", "Virgile" => "ESP", "Marie-Claire" => "ENG"];
    ksort($people);
    foreach($people as $name => $lang)
    {
        if($lang == "FRA")
        echo "Salut ";
        else if($lang == "ESP")
        echo "Hola ";
        else
        echo "Hello ";
        echo $name."<br>";
    }
?>
