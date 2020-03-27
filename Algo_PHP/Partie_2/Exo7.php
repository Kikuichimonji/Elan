<?php
    $elements = array("1"=>"Choix 1","2"=>"Choix 2","3"=>"Choix 3");
    $check = array("Choix 1"=>"","Choix 2"=>"checked ","Choix 3"=>"");
    function genererCheckbox($tab,$check){     // A function that generate checkbox out of an array
        $retour = "<form>";
        foreach($tab as $key => $val)
        {
           $retour=$retour."<input type='checkbox' id='".$key."' value='".$key."' ".$check[$val].">";
           $retour=$retour."<label>".$val."</label><br>";
        }
        $retour=$retour."</form>";
        return $retour;
    }
    echo genererCheckbox($elements,$check);;
?>