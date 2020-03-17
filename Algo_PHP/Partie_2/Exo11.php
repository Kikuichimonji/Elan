<?php
    setlocale(LC_TIME, "fr_FR");
    $date = "2018-02-23"; //on assume qu'il reste sous ce format
    function formaterDateFR($dat)
    {
        $year = substr($dat, -10,4);
        $month = substr($dat, -5,2);
        $day = substr($dat, -2);
        $dayval = strftime("%A",strtotime($dat));
        $monthval = utf8_encode(strftime("%B",strtotime($dat)));
        echo $dayval." ".$day." ".$monthval." ".$year;
    }
    formaterDateFR($date);

?>