<?php 
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: index.php");
    }
    echo "Bienvenue ".$_SESSION["user"]["username"];
?>