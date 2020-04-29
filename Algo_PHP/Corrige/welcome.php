<?php
    session_start();
    if(isset($_SESSION['user']))
        echo "hello ".$_SESSION['user']['username'];
    else   
        echo "degage";

?>
 <button type="submit">Logout</button>