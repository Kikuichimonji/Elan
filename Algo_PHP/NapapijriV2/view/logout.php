<?php
    session_start();
    if(isset($_COOKIE['CookieMonster']))
    {
        foreach($_COOKIE['CookieMonster'] as $name => $value){ 
            setcookie("CookieMonster[$name]",$value,time()-3600,"/");
        }   
    }
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    header("Location: ../index.php");
?>