<?php
    session_start();
    if(isset($_SESSION['user']))
        echo "hello ".$_SESSION['user']['username'];
    else if (isset($_SESSION['userearly'])) 
        echo "hello ".$_SESSION['userearly']['nom'].$_SESSION['userearly']['prenom'];
    else
        echo "degage";

?>
 <button type="submit">Logout</button>