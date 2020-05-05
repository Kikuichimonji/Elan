<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    if(isset($_COOKIE['CookieMonster']))
        foreach($_COOKIE['CookieMonster'] as $name => $value){ 
            setcookie("CookieMonster[$name]",$value,time()-3600);
        }   
    header("Location: index.php");
?>