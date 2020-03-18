<?php
    $elements = array("1"=>"Choix 1","2"=>"Choix 2","3"=>"Choix 3");
    function genererCheckbox($tab){     // A function that generate checkbox out of an array
        echo "<form>";
        foreach($tab as $key => $val)
        {
            echo "<input type='checkbox' id='".$key."'id='choix".$key."' value='".$key."'>";
            echo "<label>".$val."</label><br>";
        }
        echo "</form>";
    }
    genererCheckbox($elements);;
?>