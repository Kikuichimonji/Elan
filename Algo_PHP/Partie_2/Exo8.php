<?php
    //$rand = rand(1,10); //c'est plus fun avec un rand
    $url = "http://my.mobirise.com/data/userpic/764.jpg";

    function repeterImage($url,$val){       // A function that generate multiple pictures depending on the number sent
        return str_repeat("<img src='".$url."' alt='doggo'>",$val);
    }
    echo repeterImage($url,5);
?>