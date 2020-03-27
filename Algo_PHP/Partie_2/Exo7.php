<?php
    $check = array("Choix 1"=>"","Choix 2"=>"checked ","Choix 3"=>"");
    function genererCheckbox($check){     // A function that generate checkbox out of an array
        $retour = "<form>";
        foreach($check as $key => $val)
        {
           $retour.="<input type='checkbox' ".$val."><label>".$key."</label><br>";
        }
        $retour.="</form>";
        return $retour;
    }
    echo genererCheckbox($check);
?>