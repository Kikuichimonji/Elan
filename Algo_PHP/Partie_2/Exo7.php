<?php
    $elements = array("1"=>"Choix 1","2"=>"Choix 2","3"=>"Choix 3");
    function genererCheckbox($tab){     // A function that generate checkbox out of an array
        $retour = "<form>";
        foreach($tab as $key => $val)
        {
           $retour=$retour."<input type='checkbox' id='".$key."'id='choix".$key."' value='".$key."'>";
           $retour=$retour."<label>".$val."</label><br>";
        }
        $retour=$retour."</form>";
        return $retour;
    }
    echo genererCheckbox($elements);;
?>