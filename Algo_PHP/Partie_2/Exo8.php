<?php
    //$rand = rand(1,10); //c'est plus fun avec un rand
    $url = "http://my.mobirise.com/data/userpic/764.jpg";

    function repeterImage($url,$val){
        for($i = 0;$i < $val;$i++)
        echo "<img src='".$url."' alt='doggo'>" ;
    }
    repeterImage($url,4);
?>